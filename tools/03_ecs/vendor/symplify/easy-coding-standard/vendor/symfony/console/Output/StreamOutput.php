<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ECSPrefix20220220\Symfony\Component\Console\Output;

use ECSPrefix20220220\Symfony\Component\Console\Exception\InvalidArgumentException;
use ECSPrefix20220220\Symfony\Component\Console\Formatter\OutputFormatterInterface;
/**
 * StreamOutput writes the output to a given stream.
 *
 * Usage:
 *
 *     $output = new StreamOutput(fopen('php://stdout', 'w'));
 *
 * As `StreamOutput` can use any stream, you can also use a file:
 *
 *     $output = new StreamOutput(fopen('/path/to/output.log', 'a', false));
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class StreamOutput extends \ECSPrefix20220220\Symfony\Component\Console\Output\Output
{
    private $stream;
    /**
     * @param resource                      $stream    A stream resource
     * @param int                           $verbosity The verbosity level (one of the VERBOSITY constants in OutputInterface)
     * @param bool|null                     $decorated Whether to decorate messages (null for auto-guessing)
     * @param OutputFormatterInterface|null $formatter Output formatter instance (null to use default OutputFormatter)
     *
     * @throws InvalidArgumentException When first argument is not a real stream
     */
    public function __construct($stream, int $verbosity = self::VERBOSITY_NORMAL, bool $decorated = null, \ECSPrefix20220220\Symfony\Component\Console\Formatter\OutputFormatterInterface $formatter = null)
    {
        if (!\is_resource($stream) || 'stream' !== \get_resource_type($stream)) {
            throw new \ECSPrefix20220220\Symfony\Component\Console\Exception\InvalidArgumentException('The StreamOutput class needs a stream as its first argument.');
        }
        $this->stream = $stream;
        if (null === $decorated) {
            $decorated = $this->hasColorSupport();
        }
        parent::__construct($verbosity, $decorated, $formatter);
    }
    /**
     * Gets the stream attached to this StreamOutput instance.
     *
     * @return resource
     */
    public function getStream()
    {
        return $this->stream;
    }
    /**
     * {@inheritdoc}
     */
    protected function doWrite(string $message, bool $newline)
    {
        if ($newline) {
            $message .= \PHP_EOL;
        }
        @\fwrite($this->stream, $message);
        \fflush($this->stream);
    }
    /**
     * Returns true if the stream supports colorization.
     *
     * Colorization is disabled if not supported by the stream:
     *
     * This is tricky on Windows, because Cygwin, Msys2 etc emulate pseudo
     * terminals via named pipes, so we can only check the environment.
     *
     * Reference: Composer\XdebugHandler\Process::supportsColor
     * https://github.com/composer/xdebug-handler
     *
     * @return bool true if the stream supports colorization, false otherwise
     */
    protected function hasColorSupport() : bool
    {
        // Follow https://no-color.org/
        if (isset($_SERVER['NO_COLOR']) || \false !== \getenv('NO_COLOR')) {
            return \false;
        }
        if ('Hyper' === \getenv('TERM_PROGRAM')) {
            return \true;
        }
        if (\DIRECTORY_SEPARATOR === '\\') {
            return \function_exists('sapi_windows_vt100_support') && @\sapi_windows_vt100_support($this->stream) || \false !== \getenv('ANSICON') || 'ON' === \getenv('ConEmuANSI') || 'xterm' === \getenv('TERM');
        }
        $streamIsatty = function ($stream) {
            if (\function_exists('stream_isatty')) {
                return \stream_isatty($stream);
            }
            if (!\is_resource($stream)) {
                \trigger_error('stream_isatty() expects parameter 1 to be resource, ' . \gettype($stream) . ' given', \E_USER_WARNING);
                return \false;
            }
            if ('\\' === \DIRECTORY_SEPARATOR) {
                $stat = @\fstat($stream);
                // Check if formatted mode is S_IFCHR
                return $stat ? 020000 === ($stat['mode'] & 0170000) : \false;
            }
            return \function_exists('posix_isatty') && @\posix_isatty($stream);
        };
        return $streamIsatty($this->stream);
    }
}