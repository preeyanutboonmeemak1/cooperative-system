<?php

declare (strict_types=1);
namespace ECSPrefix20220220\Symplify\Skipper\SkipVoter;

use ECSPrefix20220220\Symplify\PackageBuilder\Parameter\ParameterProvider;
use ECSPrefix20220220\Symplify\PackageBuilder\Reflection\ClassLikeExistenceChecker;
use ECSPrefix20220220\Symplify\Skipper\Contract\SkipVoterInterface;
use ECSPrefix20220220\Symplify\Skipper\SkipCriteriaResolver\SkippedClassResolver;
use ECSPrefix20220220\Symplify\Skipper\Skipper\OnlySkipper;
use ECSPrefix20220220\Symplify\Skipper\Skipper\SkipSkipper;
use ECSPrefix20220220\Symplify\Skipper\ValueObject\Option;
use ECSPrefix20220220\Symplify\SmartFileSystem\SmartFileInfo;
final class ClassSkipVoter implements \ECSPrefix20220220\Symplify\Skipper\Contract\SkipVoterInterface
{
    /**
     * @var \Symplify\PackageBuilder\Reflection\ClassLikeExistenceChecker
     */
    private $classLikeExistenceChecker;
    /**
     * @var \Symplify\PackageBuilder\Parameter\ParameterProvider
     */
    private $parameterProvider;
    /**
     * @var \Symplify\Skipper\Skipper\SkipSkipper
     */
    private $skipSkipper;
    /**
     * @var \Symplify\Skipper\Skipper\OnlySkipper
     */
    private $onlySkipper;
    /**
     * @var \Symplify\Skipper\SkipCriteriaResolver\SkippedClassResolver
     */
    private $skippedClassResolver;
    public function __construct(\ECSPrefix20220220\Symplify\PackageBuilder\Reflection\ClassLikeExistenceChecker $classLikeExistenceChecker, \ECSPrefix20220220\Symplify\PackageBuilder\Parameter\ParameterProvider $parameterProvider, \ECSPrefix20220220\Symplify\Skipper\Skipper\SkipSkipper $skipSkipper, \ECSPrefix20220220\Symplify\Skipper\Skipper\OnlySkipper $onlySkipper, \ECSPrefix20220220\Symplify\Skipper\SkipCriteriaResolver\SkippedClassResolver $skippedClassResolver)
    {
        $this->classLikeExistenceChecker = $classLikeExistenceChecker;
        $this->parameterProvider = $parameterProvider;
        $this->skipSkipper = $skipSkipper;
        $this->onlySkipper = $onlySkipper;
        $this->skippedClassResolver = $skippedClassResolver;
    }
    /**
     * @param object|string $element
     */
    public function match($element) : bool
    {
        if (\is_object($element)) {
            return \true;
        }
        return $this->classLikeExistenceChecker->doesClassLikeExist($element);
    }
    /**
     * @param object|string $element
     */
    public function shouldSkip($element, \ECSPrefix20220220\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : bool
    {
        $only = $this->parameterProvider->provideArrayParameter(\ECSPrefix20220220\Symplify\Skipper\ValueObject\Option::ONLY);
        $doesMatchOnly = $this->onlySkipper->doesMatchOnly($element, $smartFileInfo, $only);
        if (\is_bool($doesMatchOnly)) {
            return $doesMatchOnly;
        }
        $skippedClasses = $this->skippedClassResolver->resolve();
        return $this->skipSkipper->doesMatchSkip($element, $smartFileInfo, $skippedClasses);
    }
}
