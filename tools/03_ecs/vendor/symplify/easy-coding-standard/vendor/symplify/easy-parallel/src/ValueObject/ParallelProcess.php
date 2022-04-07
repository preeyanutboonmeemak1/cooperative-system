<?php

declare (strict_types=1);
namespace ECSPrefix20220220\Symplify\EasyParallel\ValueObject;

use ECSPrefix20220220\Clue\React\NDJson\Decoder;
use ECSPrefix20220220\Clue\React\NDJson\Encoder;
use Exception;
use ECSPrefix20220220\React\ChildProcess\Process;
use ECSPrefix20220220\React\EventLoop\LoopInterface;
use ECSPrefix20220220\React\EventLoop\TimerInterface;
use ECSPrefix20220220\Symplify\EasyParallel\Enum\Action;
use ECSPrefix20220220\Symplify\EasyParallel\Enum\Content;
use ECSPrefix20220220\Symplify\EasyParallel\Enum\ReactCommand;
use ECSPrefix20220220\Symplify\EasyParallel\Enum\ReactEvent;
use ECSPrefix20220220\Symplify\EasyParallel\Exception\ParallelShouldNotHappenException;
use Throwable;
/**
 * Inspired at @see https://raw.githubusercontent.com/phpstan/phpstan-src/master/src/Parallel/Process.php
 */
final class ParallelProcess
{
    /**
     * @var \React\ChildProcess\Process
     */
    public $process;
    /**
     * @var \Clue\React\NDJson\Encoder
     */
    private $encoder;
    /**
     * @var resource
     */
    private $stdErr;
    /**
     * @var callable(mixed[]) : void
     */
    private $onData;
    /**
     * @var callable(Throwable): void
     */
    private $onError;
    /**
     * @var \React\EventLoop\TimerInterface|null
     */
    private $timer;
    /**
     * @var string
     */
    private $command;
    /**
     * @var \React\EventLoop\LoopInterface
     */
    private $loop;
    /**
     * @var int
     */
    private $timetoutInSeconds;
    public function __construct(string $command, \ECSPrefix20220220\React\EventLoop\LoopInterface $loop, int $timetoutInSeconds)
    {
        $this->command = $command;
        $this->loop = $loop;
        $this->timetoutInSeconds = $timetoutInSeconds;
    }
    /**
     * @param callable(mixed[] $onData) : void $onData
     * @param callable(Throwable $onError) : void $onError
     * @param callable(?int $onExit, string $output) : void $onExit
     */
    public function start(callable $onData, callable $onError, callable $onExit) : void
    {
        $tmp = \tmpfile();
        if ($tmp === \false) {
            throw new \ECSPrefix20220220\Symplify\EasyParallel\Exception\ParallelShouldNotHappenException('Failed creating temp file.');
        }
        $this->stdErr = $tmp;
        $this->process = new \ECSPrefix20220220\React\ChildProcess\Process($this->command, null, null, [2 => $this->stdErr]);
        $this->process->start($this->loop);
        $this->onData = $onData;
        $this->onError = $onError;
        $this->process->on(\ECSPrefix20220220\Symplify\EasyParallel\Enum\ReactEvent::EXIT, function ($exitCode) use($onExit) : void {
            $this->cancelTimer();
            \rewind($this->stdErr);
            /** @var string $streamContents */
            $streamContents = \stream_get_contents($this->stdErr);
            $onExit($exitCode, $streamContents);
            \fclose($this->stdErr);
        });
    }
    /**
     * @param mixed[] $data
     */
    public function request(array $data) : void
    {
        $this->cancelTimer();
        $this->encoder->write($data);
        $this->timer = $this->loop->addTimer($this->timetoutInSeconds, function () : void {
            $onError = $this->onError;
            $errorMessage = \sprintf('Child process timed out after %d seconds', $this->timetoutInSeconds);
            $onError(new \Exception($errorMessage));
        });
    }
    public function quit() : void
    {
        $this->cancelTimer();
        if (!$this->process->isRunning()) {
            return;
        }
        foreach ($this->process->pipes as $pipe) {
            $pipe->close();
        }
        $this->encoder->end();
        $this->process->terminate();
    }
    public function bindConnection(\ECSPrefix20220220\Clue\React\NDJson\Decoder $decoder, \ECSPrefix20220220\Clue\React\NDJson\Encoder $encoder) : void
    {
        $decoder->on(\ECSPrefix20220220\Symplify\EasyParallel\Enum\ReactEvent::DATA, function (array $json) : void {
            $this->cancelTimer();
            if ($json[\ECSPrefix20220220\Symplify\EasyParallel\Enum\ReactCommand::ACTION] !== \ECSPrefix20220220\Symplify\EasyParallel\Enum\Action::RESULT) {
                return;
            }
            $onData = $this->onData;
            $onData($json[\ECSPrefix20220220\Symplify\EasyParallel\Enum\Content::RESULT]);
        });
        $this->encoder = $encoder;
        $decoder->on(\ECSPrefix20220220\Symplify\EasyParallel\Enum\ReactEvent::ERROR, function (\Throwable $error) : void {
            $onError = $this->onError;
            $onError($error);
        });
        $encoder->on(\ECSPrefix20220220\Symplify\EasyParallel\Enum\ReactEvent::ERROR, function (\Throwable $error) : void {
            $onError = $this->onError;
            $onError($error);
        });
    }
    private function cancelTimer() : void
    {
        if ($this->timer === null) {
            return;
        }
        $this->loop->cancelTimer($this->timer);
        $this->timer = null;
    }
}
