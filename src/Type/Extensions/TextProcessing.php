<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP Text Processing extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.basic.text.php
 */
enum TextProcessing: string
{
    // CommonMark
    case CommonMark_Node_Document = 'https://www.php.net/manual/{lang}/class.commonmark-node-document.php';
    case CommonMark_Node_Heading = 'https://www.php.net/manual/{lang}/class.commonmark-node-heading.php';
    case CommonMark_Node_Paragraph = 'https://www.php.net/manual/{lang}/class.commonmark-node-paragraph.php';
    case CommonMark_Node_BlockQuote = 'https://www.php.net/manual/{lang}/class.commonmark-node-blockquote.php';
    case CommonMark_Node_BulletList = 'https://www.php.net/manual/{lang}/class.commonmark-node-bulletlist.php';
    case CommonMark_Node_OrderedList = 'https://www.php.net/manual/{lang}/class.commonmark-node-orderedlist.php';
    case CommonMark_Node_Item = 'https://www.php.net/manual/{lang}/class.commonmark-node-item.php';
    case CommonMark_Node_Text = 'https://www.php.net/manual/{lang}/class.commonmark-node-text.php';
    case CommonMark_Node_TextStrong = 'https://www.php.net/manual/{lang}/class.commonmark-node-text-strong.php';
    case CommonMark_Node_TextEmphasis = 'https://www.php.net/manual/{lang}/class.commonmark-node-text-emphasis.php';
    case CommonMark_Node_ThematicBreak = 'https://www.php.net/manual/{lang}/class.commonmark-node-thematicbreak.php';
    case CommonMark_Node_SoftBreak = 'https://www.php.net/manual/{lang}/class.commonmark-node-softbreak.php';
    case CommonMark_Node_LineBreak = 'https://www.php.net/manual/{lang}/class.commonmark-node-linebreak.php';
    case CommonMark_Node_Code = 'https://www.php.net/manual/{lang}/class.commonmark-node-code.php';
    case CommonMark_Node_CodeBlock = 'https://www.php.net/manual/{lang}/class.commonmark-node-codeblock.php';
    case CommonMark_Node_HTMLBlock = 'https://www.php.net/manual/{lang}/class.commonmark-node-htmlblock.php';
    case CommonMark_Node_HTMLInline = 'https://www.php.net/manual/{lang}/class.commonmark-node-htmlinline.php';
    case CommonMark_Node_Image = 'https://www.php.net/manual/{lang}/class.commonmark-node-image.php';
    case CommonMark_Node_Link = 'https://www.php.net/manual/{lang}/class.commonmark-node-link.php';
    case CommonMark_Node_CustomBlock = 'https://www.php.net/manual/{lang}/class.commonmark-node-customblock.php';
    case CommonMark_Node_CustomInline = 'https://www.php.net/manual/{lang}/class.commonmark-node-custominline.php';
    case CommonMark_Node_ = 'https://www.php.net/manual/{lang}/class.commonmark-node.php';
    case CommonMark_Interfaces_IVisitor = 'https://www.php.net/manual/{lang}/class.commonmark-interfaces-ivisitor.php';
    case CommonMark_Interfaces_IVisitable = 'https://www.php.net/manual/{lang}/class.commonmark-interfaces-ivisitable.php';
    case CommonMark_Parser = 'https://www.php.net/manual/{lang}/class.commonmark-parser.php';
    case CommonMark_CQL = 'https://www.php.net/manual/{lang}/class.commonmark-cql.php';

    // Parle
    case Parle_Lexer = 'https://www.php.net/manual/{lang}/class.parle-lexer.php';
    case Parle_RLexer = 'https://www.php.net/manual/{lang}/class.parle-rlexer.php';
    case Parle_Parser = 'https://www.php.net/manual/{lang}/class.parle-parser.php';
    case Parle_RParser = 'https://www.php.net/manual/{lang}/class.parle-rparser.php';
    case Parle_Stack = 'https://www.php.net/manual/{lang}/class.parle-stack.php';
    case Parle_Token = 'https://www.php.net/manual/{lang}/class.parle-token.php';
    case Parle_ErrorInfo = 'https://www.php.net/manual/{lang}/class.parle-errorinfo.php';
    case Parle_LexerException = 'https://www.php.net/manual/{lang}/class.parle-lexerexception.php';
    case Parle_ParserException = 'https://www.php.net/manual/{lang}/class.parle-parserexception.php';
}