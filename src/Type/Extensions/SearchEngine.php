<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP Search Engine extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.search.php
 */
enum SearchEngine: string
{
    // Apache Solr
    case SolrUtils = 'https://www.php.net/manual/{lang}/class.solrutils.php';
    case SolrInputDocument = 'https://www.php.net/manual/{lang}/class.solrinputdocument.php';
    case SolrDocument = 'https://www.php.net/manual/{lang}/class.solrdocument.php';
    case SolrDocumentField = 'https://www.php.net/manual/{lang}/class.solrdocumentfield.php';
    case SolrObject = 'https://www.php.net/manual/{lang}/class.solrobject.php';
    case SolrClient = 'https://www.php.net/manual/{lang}/class.solrclient.php';
    case SolrResponse = 'https://www.php.net/manual/{lang}/class.solrresponse.php';
    case SolrQueryResponse = 'https://www.php.net/manual/{lang}/class.solrqueryresponse.php';
    case SolrUpdateResponse = 'https://www.php.net/manual/{lang}/class.solrupdateresponse.php';
    case SolrPingResponse = 'https://www.php.net/manual/{lang}/class.solrpingresponse.php';
    case SolrGenericResponse = 'https://www.php.net/manual/{lang}/class.solrgenericresponse.php';
    case SolrParams = 'https://www.php.net/manual/{lang}/class.solrparams.php';
    case SolrModifiableParams = 'https://www.php.net/manual/{lang}/class.solrmodifiableparams.php';
    case SolrQuery = 'https://www.php.net/manual/{lang}/class.solrquery.php';
    case SolrDisMaxQuery = 'https://www.php.net/manual/{lang}/class.solrdismaxquery.php';
    case SolrCollapseFunction = 'https://www.php.net/manual/{lang}/class.solrcollapsefunction.php';
    case SolrException = 'https://www.php.net/manual/{lang}/class.solrexception.php';
    case SolrClientException = 'https://www.php.net/manual/{lang}/class.solrclientexception.php';
    case SolrServerException = 'https://www.php.net/manual/{lang}/class.solrserverexception.php';
    case SolrIllegalArgumentException = 'https://www.php.net/manual/{lang}/class.solrillegalargumentexception.php';
    case SolrIllegalOperationException = 'https://www.php.net/manual/{lang}/class.solrillegaloperationexception.php';
    case SolrMissingMandatoryParameterException
        = 'https://www.php.net/manual/{lang}/class.solrmissingmandatoryparameterexception.php'
    ;
}