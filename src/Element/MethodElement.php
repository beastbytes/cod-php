<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use ReflectionParameter;
use ReflectionType;
use RuntimeException;

/** Represents a Method structural element. */
final class MethodElement extends Element
{
    use DeclaringClassTrait;
    use ModifierTrait;
    use ThrowsTrait;

    /** @var bool $hasParameters `true` if the method has parameters, `false` if not. */
    public bool $hasParameters {
        get => !empty($this->parameters);
    }

    /** @var bool $hasReturnType `true` if the method has a return type, `false` if not. */
    public bool $hasReturnType {
        get => $this->reflector->hasReturnType();
    }

    /** @var bool $isConstructor `true` if the method is a contructor, `false` if not */
    public bool $isConstructor {
        get => $this->reflector->isConstructor();
    }

    /** @var bool $isDestructor `true` if the method is a destructor, `false` if not */
    public bool $isDestructor {
        get => $this->reflector->isDestructor();
    }

    /** @var array $parameters Method parameters indexed by name. */
    public array $parameters = [] {
        get {
            if (empty($this->parameters)) {
                /** @var ReflectionParameter $parameter */
                foreach ($this->reflector->getParameters() as $parameter) {
                    $this->parameters[$parameter->getName()] =  new ParameterElement(
                        $parameter,
                        $this->parameterDescription($parameter)
                    );
                }
            }

            return $this->parameters;
        }
    }

    /** @var bool $returnsReference `true` if the method returns a reference, `false` if not. */
    public bool $returnsReference {
        get => $this->reflector->returnsReference();
    }

    /** @var ?ReflectionType $returnType Method return type or `null` if the method does not have a return type. */
    public ?ReflectionType $returnType {
        get => $this->reflector->getReturnType();
    }

    /** @var string $returnValueDescription Method return value description. */
    public string $returnValueDescription {
        get {
            if ($this->hasDocBlock) {
                foreach ($this->docBlock->getTagsByName('return') as $tag) {
                    return $tag->getDescription()->render();
                };
            }

            return '';
        }
    }

    private function parameterDescription(ReflectionParameter $parameter): string
    {
        if ($this->hasDocBlock) {
            foreach ($this->docBlock->getTagsByName('param') as $tag) {
                if ($tag->getVariableName() === $parameter->getName()) {
                    return $tag->getDescription()->render();
                }
            };
        }

        return '';
    }
}