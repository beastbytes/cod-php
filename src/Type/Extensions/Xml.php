<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP XML extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.xml.php
 */
enum Xml: string
{
    // DOM
    case DOMAttr = 'https://www.php.net/manual/{lang}/class.domattr.php';
    case DOMCdataSection = 'https://www.php.net/manual/{lang}/class.domcdatasection.php';
    case DOMCharacterData = 'https://www.php.net/manual/{lang}/class.domcharacterdata.php';
    case DOMChildNode = 'https://www.php.net/manual/{lang}/class.domchildnode.php';
    case DOMComment = 'https://www.php.net/manual/{lang}/class.domcomment.php';
    case DOMDocument = 'https://www.php.net/manual/{lang}/class.domdocument.php';
    case DOMDocumentFragment = 'https://www.php.net/manual/{lang}/class.domdocumentfragment.php';
    case DOMDocumentType = 'https://www.php.net/manual/{lang}/class.domdocumenttype.php';
    case DOMElement = 'https://www.php.net/manual/{lang}/class.domelement.php';
    case DOMEntity = 'https://www.php.net/manual/{lang}/class.domentity.php';
    case DOMEntityReference = 'https://www.php.net/manual/{lang}/class.domentityreference.php';
    case DOMException = 'https://www.php.net/manual/{lang}/class.domexception.php';
    case DOMImplementation = 'https://www.php.net/manual/{lang}/class.domimplementation.php';
    case DOMNamedNodeMap = 'https://www.php.net/manual/{lang}/class.domnamednodemap.php';
    case DOMNameSpaceNode = 'https://www.php.net/manual/{lang}/class.domnamespacenode.php';
    case DOMNode = 'https://www.php.net/manual/{lang}/class.domnode.php';
    case DOMNodeList = 'https://www.php.net/manual/{lang}/class.domnodelist.php';
    case DOMNotation = 'https://www.php.net/manual/{lang}/class.domnotation.php';
    case DOMParentNode = 'https://www.php.net/manual/{lang}/class.domparentnode.php';
    case DOMProcessingInstruction = 'https://www.php.net/manual/{lang}/class.domprocessinginstruction.php';
    case DOMText = 'https://www.php.net/manual/{lang}/class.domtext.php';
    case DOMXPath = 'https://www.php.net/manual/{lang}/class.domxpath.php';
    case Dom_AdjacentPosition = 'https://www.php.net/manual/{lang}/enum.dom-adjacentposition.php';
    case Dom_Attr = 'https://www.php.net/manual/{lang}/class.dom-attr.php';
    case Dom_CDATASection = 'https://www.php.net/manual/{lang}/class.dom-cdatasection.php';
    case Dom_CharacterData = 'https://www.php.net/manual/{lang}/class.dom-characterdata.php';
    case Dom_ChildNode = 'https://www.php.net/manual/{lang}/class.dom-childnode.php';
    case Dom_Comment = 'https://www.php.net/manual/{lang}/class.dom-comment.php';
    case Dom_Document = 'https://www.php.net/manual/{lang}/class.dom-document.php';
    case Dom_DocumentFragment = 'https://www.php.net/manual/{lang}/class.dom-documentfragment.php';
    case Dom_DocumentType = 'https://www.php.net/manual/{lang}/class.dom-documenttype.php';
    case Dom_DtdNamedNodeMap = 'https://www.php.net/manual/{lang}/class.dom-dtdnamednodemap.php';
    case Dom_Element = 'https://www.php.net/manual/{lang}/class.dom-element.php';
    case Dom_Entity = 'https://www.php.net/manual/{lang}/class.dom-entity.php';
    case Dom_EntityReference = 'https://www.php.net/manual/{lang}/class.dom-entityreference.php';
    case Dom_HTMLCollection = 'https://www.php.net/manual/{lang}/class.dom-htmlcollection.php';
    case Dom_HTMLDocument = 'https://www.php.net/manual/{lang}/class.dom-htmldocument.php';
    case Dom_HTMLElement = 'https://www.php.net/manual/{lang}/class.dom-htmlelement.php';
    case Dom_Implementation = 'https://www.php.net/manual/{lang}/class.dom-implementation.php';
    case Dom_NamedNodeMap = 'https://www.php.net/manual/{lang}/class.dom-namednodemap.php';
    case Dom_NamespaceInfo = 'https://www.php.net/manual/{lang}/class.dom-namespaceinfo.php';
    case Dom_Node = 'https://www.php.net/manual/{lang}/class.dom-node.php';
    case Dom_NodeList = 'https://www.php.net/manual/{lang}/class.dom-nodelist.php';
    case Dom_Notation = 'https://www.php.net/manual/{lang}/class.dom-notation.php';
    case Dom_ParentNode = 'https://www.php.net/manual/{lang}/class.dom-parentnode.php';
    case Dom_ProcessingInstruction = 'https://www.php.net/manual/{lang}/class.dom-processinginstruction.php';
    case Dom_Text = 'https://www.php.net/manual/{lang}/class.dom-text.php';
    case Dom_TokenList = 'https://www.php.net/manual/{lang}/class.dom-tokenlist.php';
    case Dom_XMLDocument = 'https://www.php.net/manual/{lang}/class.dom-xmldocument.php';
    case Dom_XPath = 'https://www.php.net/manual/{lang}/class.dom-xpath.php';

    // LibXML
    case LibXMLError = 'https://www.php.net/manual/{lang}/class.libxmlerror.php';

    // SimpleXML
    case SimpleXMLElement = 'https://www.php.net/manual/{lang}/class.simplexmlelement.php';
    case SimpleXMLIterator = 'https://www.php.net/manual/{lang}/class.simplexmliterator.php';

    // XmlDiff
    case XmlDiffBase = 'https://www.php.net/manual/{lang}/class.xmldiff-base.php';
    case XmlDiffDOM = 'https://www.php.net/manual/{lang}/class.xmldiff-dom.php';
    case XmlDiffException = 'https://www.php.net/manual/{lang}/class.xmldiff-exception.php';
    case XmlDiffFile = 'https://www.php.net/manual/{lang}/class.xmldiff-file.php';
    case XmlDiffMemory = 'https://www.php.net/manual/{lang}/class.xmldiff-memory.php.php';

    case XMLParser = 'https://www.php.net/manual/{lang}/book.xml.php';
    case XMLReader = 'https://www.php.net/manual/{lang}/book.xmlreader.php';
    case XMLWriter = 'https://www.php.net/manual/{lang}/book.xmlwriter.php';

    case XSLTProcessor = 'https://www.php.net/manual/{lang}/class.xsltprocessor.php';
}