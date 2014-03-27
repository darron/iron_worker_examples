using HtmlAgilityPack;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace href_parser
{
    class Program
    {
        static void Main(string[] args)
        {
            // load snippet
            HtmlDocument htmlSnippet = new HtmlDocument();
            htmlSnippet = LoadHtmlSnippetFromFile();

            // extract hrefs
            List<string> hrefTags = new List<string>();
            hrefTags = ExtractAllAHrefTags(htmlSnippet);
            Console.WriteLine("Href count = " + hrefTags.Count);
            foreach (string href in hrefTags)
            {
                Console.WriteLine(href);
            }

        }
        private static HtmlDocument LoadHtmlSnippetFromFile()
        {
            TextReader reader = File.OpenText("HtmlSnippet.txt");

            HtmlDocument doc = new HtmlDocument();
            doc.Load(reader);

            reader.Close();

            return doc;
        }

        private static List<string> ExtractAllAHrefTags(HtmlDocument htmlSnippet)
        {
            List<string> hrefTags = new List<string>();

            foreach (HtmlNode link in htmlSnippet.DocumentNode.SelectNodes("//a[@href]"))
            {
                HtmlAttribute att = link.Attributes["href"];
                hrefTags.Add(att.Value);
            }

            return hrefTags;
        }

    }
}
