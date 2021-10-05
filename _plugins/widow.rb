module Jekyll
  module Widow

    def widow(text)
      text.gsub!(/ ([^ ]*)$/, '&nbsp;\1')
    end

    def widow2(text)
      "foob"
    end

  end
end

# Use: {{ page.title | widow }}
Liquid::Template.register_filter(Jekyll::Widow)