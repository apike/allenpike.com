module Jekyll
  module Allenpike

    def defaultshareimg(text)
      if text
        return text
      else
        return "/images/simple-share-square.jpg"
      end
    end

    include Liquid::StandardFilters

    def reading_time(input)
      # Get words count.
      total_words = get_plain_text(input).split.size

      second_plural = "sec"
      minute_singular = "min"
      minute_plural = "min"

      # Average reading words per minute.
      words_per_minute = 210

      # Calculate reading time.
      case total_words
      when 0 .. 89
        return "30 #{second_plural}"
      when 90 .. 269
        return "1 #{minute_singular}"
      when 270 .. 449
        return "2 #{minute_plural}"
      when 450 .. 629
        return "3 #{minute_plural}"
      when 630 .. 809
        return "4 #{minute_plural}"
      when 810 .. 1050
        return "5 #{minute_plural}"
      else
        minutes = ( total_words / words_per_minute ).floor
        return "#{minutes} #{minute_plural}";
      end
    end

    def get_plain_text(input)
      strip_html(strip_pre_tags(input))
    end

    def strip_pre_tags(input)
      empty = ''.freeze
      input.to_s.gsub(/<pre(?:(?!<\/pre).|\s)*<\/pre>/mi, empty)
    end

  end
end

Liquid::Template.register_filter(Jekyll::Allenpike)