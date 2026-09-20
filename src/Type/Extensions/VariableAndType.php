<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP Variable and Type extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.basic.vartype.php
 */
enum VariableAndType: string
{
    // Filter
    case Filter_FilterException = 'https://www.php.net/manual/{lang}/class.filter-filterexception.php';
    case Filter_FilterFailedException = 'https://www.php.net/manual/{lang}/class.filter-filterfailedexception.php';

    // Quickhash
    case QuickHashIntSet = 'https://www.php.net/manual/{lang}/class.quickhashintset.php';
    case QuickHashIntHash = 'https://www.php.net/manual/{lang}/class.quickhashinthash.php';
    case QuickHashStringIntHash = 'https://www.php.net/manual/{lang}/class.quickhashstringinthash.php';
    case QuickHashIntStringHash = 'https://www.php.net/manual/{lang}/class.quickhashintstringhash.php';

    // Reflection
    case PropertyHookType = 'https://www.php.net/manual/{lang}/enum.propertyhooktype.php';
    case Reflection = 'https://www.php.net/manual/{lang}/class.reflection.php';
    case ReflectionAttribute = 'https://www.php.net/manual/{lang}/class.reflectionattribute.php';
    case ReflectionClass = 'https://www.php.net/manual/{lang}/class.reflectionclass.php';
    case ReflectionClassConstant = 'https://www.php.net/manual/{lang}/class.reflectionclassconstant.php';
    case ReflectionConstant = 'https://www.php.net/manual/{lang}/class.reflectionconstant.php';
    case ReflectionEnum = 'https://www.php.net/manual/{lang}/class.reflectionenum.php';
    case ReflectionEnumUnitCase = 'https://www.php.net/manual/{lang}/class.reflectionenumunitcase.php';
    case ReflectionEnumBackedCase = 'https://www.php.net/manual/{lang}/class.reflectionenumbackedcase.php';
    case ReflectionExtension = 'https://www.php.net/manual/{lang}/class.reflectionextension.php';
    case ReflectionFiber = 'https://www.php.net/manual/{lang}/class.reflectionfiber.php';
    case ReflectionFunction = 'https://www.php.net/manual/{lang}/class.reflectionfunction.php';
    case ReflectionFunctionAbstract = 'https://www.php.net/manual/{lang}/class.reflectionfunctionabstract.php';
    case ReflectionGenerator = 'https://www.php.net/manual/{lang}/class.reflectiongenerator.php';
    case ReflectionIntersectionType = 'https://www.php.net/manual/{lang}/class.reflectionintersectiontype.php';
    case ReflectionMethod = 'https://www.php.net/manual/{lang}/class.reflectionmethod.php';
    case ReflectionNamedType = 'https://www.php.net/manual/{lang}/class.reflectionnamedtype.php';
    case ReflectionObject = 'https://www.php.net/manual/{lang}/class.reflectionobject.php';
    case ReflectionParameter = 'https://www.php.net/manual/{lang}/class.reflectionparameter.php';
    case ReflectionProperty = 'https://www.php.net/manual/{lang}/class.reflectionproperty.php';
    case ReflectionReference = 'https://www.php.net/manual/{lang}/class.reflectionreference.php';
    case ReflectionUnionType = 'https://www.php.net/manual/{lang}/class.reflectionuniontype.php';
    case ReflectionZendExtension = 'https://www.php.net/manual/{lang}/class.reflectionzendextension.php';
    case Reflector = 'https://www.php.net/manual/{lang}/class.reflector.php';
    case ReflectionType = 'https://www.php.net/manual/{lang}/class.reflectiontype.php';
    // Reflection Exceptions
    case ReflectionException = 'https://https://www.php.net/manual/{lang}/class.reflectionexception.php';
}