module Jekyll
  module Widow

    def widow(text)
      return text.gsub(/ ([^ ]*)$/, '&nbsp;\1')
    end

  end
end

# Use: {{ page.title | widow }}
Liquid::Template.register_filter(Jekyll::Widow)