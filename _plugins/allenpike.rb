module Jekyll
  module Allenpike

    def defaultshareimg(text)
      if text
        return text
      else
        return "/images/simple-share-square.jpg"
      end
    end

  end
end

Liquid::Template.register_filter(Jekyll::Allenpike)