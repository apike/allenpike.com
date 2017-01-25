module Jekyll
  module RSSURLFilter
    def relative_urls_to_absolute(input)
      url = "http://www.allenpike.com"
      input.gsub('src="/', 'src="' + url + '/').gsub("src='/", "src='" + url + '/')
        .gsub('href="/', 'href="' + url + '/')
        .gsub("&lt;img ", "&lt;img style='max-width: 100%' ")
        .gsub('src=&quot;/', 'src=&quot;' + url + '/')
        .gsub('href=&quot;/', 'href=&quot;' + url + '/')
    end

    def escape_for_json(input)
       input.gsub('"', '\"').gsub("\n", "\\n")
    end
  end
end

Liquid::Template.register_filter(Jekyll::RSSURLFilter)