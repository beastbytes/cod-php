import { defineConfig } from 'vitepress'

let currentYear = new Date().getFullYear();

// https://vitepress.dev/reference/site-config
export default defineConfig({
  lang: 'en-GB',
  base: '/cod-php/',
  srcDir: './src',

  sitemap: {
    hostname: 'https://example.com'
  },

  ignoreDeadLinks: true,
  lastUpdated: true,
  
  title: 'CodPhp',
  description: 'Reflection based API Document Generator',
  themeConfig: {
    // https://vitepress.dev/reference/default-theme-config
    logo: './src/public/cod-php.svg',
    siteTitle: 'CodPhp',
    nav: [
      {
        text: 'Guide',
        link: '/guide/index',
      },
      {
        text: 'API',
        link: '/api/index',
      },
      {
        text: 'Developers',
        link: '/developer/index',
      },
    ],
    sidebar: [
      {
        text: 'Getting Started',
        base: '/guide/',
        collapsed: true,
        items: [
          {
            text: 'Installation',
            link: 'installation'
          },
          {
            text: 'Configuration',
            link: 'configuration'
          },
          {
            text: 'Usage',
            link: 'usage'
          },
          {
            text: 'Errors',
            link: 'errors'
          }
        ]
      },
      {
        text: 'API',
        base: '/api/',
        collapsed: true,
        items: [
          {
            text: "CodPhp",
            link: "cod-php"
          },
          {
            text: "Config",
            link: "config"
          },
          {
            text: "InheritanceLevel",
            link: "inheritance-level"
          },
          {
            text: "Parser",
            link: "parser"
          },
          {
            text: " Command",
            base: "/api/command/",
            collapsed: true,
            items: [
              {
                text: "CodPhp",
                link: "cod-php"
              }
            ]
          },
          {
            text: " Element",
            base: "/api/element/",
            collapsed: true,
            items: [
              {
                text: "ClassConstantElement",
                link: "class-constant-element"
              },
              {
                text: "ClassElement",
                link: "class-element"
              },
              {
                text: "DeclaringClassTrait",
                link: "declaring-class-trait"
              },
              {
                text: "DefaultValueTrait",
                link: "default-value-trait"
              },
              {
                text: "Element",
                link: "element"
              },
              {
                text: "EnumCaseElement",
                link: "enum-case-element"
              },
              {
                text: "EnumElement",
                link: "enum-element"
              },
              {
                text: "InterfaceElement",
                link: "interface-element"
              },
              {
                text: "InvalidTagException",
                link: "invalid-tag-exception"
              },
              {
                text: "MethodElement",
                link: "method-element"
              },
              {
                text: "ModifierTrait",
                link: "modifier-trait"
              },
              {
                text: "ObjectElement",
                link: "object-element"
              },
              {
                text: "ParameterElement",
                link: "parameter-element"
              },
              {
                text: "PropertyElement",
                link: "property-element"
              },
              {
                text: "PropertyTrait",
                link: "property-trait"
              },
              {
                text: "ThrowsTrait",
                link: "throws-trait"
              },
              {
                text: "TraitElement",
                link: "trait-element"
              },
              {
                text: "TypeTrait",
                link: "type-trait"
              },
              {
                text: "Visibility",
                link: "visibility"
              }
            ]
          },
          {
            text: " Error",
            base: "/api/error/",
            collapsed: true,
            items: [
              {
                text: "Collection",
                link: "collection"
              },
              {
                text: "Error",
                link: "error"
              },
              {
                text: "ErrorLevel",
                link: "error-level"
              }
            ]
          },
          {
            text: " Renderer",
            base: "/api/renderer/",
            collapsed: true,
            items: [
              {
                text: "PhpTemplateRenderer",
                link: "php-template-renderer"
              },
              {
                text: "RenderFailedException",
                link: "render-failed-exception"
              },
              {
                text: "TemplateRendererInterface",
                link: "template-renderer-interface"
              }
            ]
          },
          {
            text: " Type",
            base: "/api/type/",
            collapsed: true,
            items: [
              {
                text: "Language",
                link: "language"
              },
              {
                text: "PhpType",
                link: "php-type"
              },
              {
                text: " Extensions",
                base: "/api/type/extensions/",
                collapsed: true,
                items: [
                  {
                    text: "CompressionAndArchive",
                    link: "compression-and-archive"
                  },
                  {
                    text: "Cryptography",
                    link: "cryptography"
                  },
                  {
                    text: "DateTime",
                    link: "date-time"
                  },
                  {
                    text: "FileSystem",
                    link: "file-system"
                  },
                  {
                    text: "Gui",
                    link: "gui"
                  },
                  {
                    text: "HumanLanguage",
                    link: "human-language"
                  },
                  {
                    text: "ImageProcessingAndGeneration",
                    link: "image-processing-and-generation"
                  },
                  {
                    text: "Mail",
                    link: "mail"
                  },
                  {
                    text: "Mathematical",
                    link: "mathematical"
                  },
                  {
                    text: "NonTextMime",
                    link: "non-text-mime"
                  },
                  {
                    text: "OtherBasicExtensions",
                    link: "other-basic-extensions"
                  },
                  {
                    text: "OtherServices",
                    link: "other-services"
                  },
                  {
                    text: "Php",
                    link: "php"
                  },
                  {
                    text: "ProcessControl",
                    link: "process-control"
                  },
                  {
                    text: "SearchEngine",
                    link: "search-engine"
                  },
                  {
                    text: "Sessions",
                    link: "sessions"
                  },
                  {
                    text: "TextProcessing",
                    link: "text-processing"
                  },
                  {
                    text: "VariableAndType",
                    link: "variable-and-type"
                  },
                  {
                    text: "WebServices",
                    link: "web-services"
                  },
                  {
                    text: "WindowsOnly",
                    link: "windows-only"
                  },
                  {
                    text: "Xml",
                    link: "xml"
                  }
                ]
              }
            ]
          },
          {
            text: " Util",
            base: "/api/util/",
            collapsed: true,
            items: [
              {
                text: "Link",
                link: "link"
              }
            ]
          },
          {
            text: " Writer",
            base: "/api/writer/",
            collapsed: true,
            items: [
              {
                text: "OutputFileNotWrittenException",
                link: "output-file-not-written-exception"
              },
              {
                text: "TemplateNotFoundException",
                link: "template-not-found-exception"
              },
              {
                text: "Writer",
                link: "writer"
              },
              {
                text: "WriterInterface",
                link: "writer-interface"
              },
              {
                text: " Markdown",
                base: "/api/writer/markdown/",
                collapsed: true,
                items: [
                  {
                    text: "Helpers",
                    link: "helpers"
                  },
                  {
                    text: "Writer",
                    link: "writer"
                  },
                  {
                    text: " Vite Press",
                    base: "/api/writer/markdown/vite-press/",
                    collapsed: true,
                    items: [
                      {
                        text: "Writer",
                        link: "writer"
                      }
                    ]
                  }
                ]
              }
            ]
          },

        ]
      },
      {
        text: 'Developers',
        base: '/developer/',
        collapsed: true,
        items: [
          {
            text: 'Developer',
            link: 'index'
          },
          {
            text: 'Templates',
            link: 'templates'
          },
          {
            text: 'Template Renderer',
            link: 'template-renderer'
          },
          {
            text: 'Writer',
            link: 'writer'
          }
        ]
      },
    ],
    socialLinks: [
      {
        icon: 'github',
        link: 'https://github.com/beastbytes/cod-php'
      }
    ],
    footer: {
      message: 'Released under the <a href="https://github.com/beastbytes/cod-php/blob/main/LICENCE">3-Clause BSD Licence</a>.',
      copyright: `Copyright © 2026-${currentYear} BeastBytes`
    }
  }
})