module Jekyll
  class WithinTagPostNavigation < Generator
    def generate(site)
      site.tags.each_pair do |tag, posts|
        if posts.count < 3
          next
        end

        posts.sort! { |a,b| b <=> a}
        posts.each do |post|
          index = posts.index post
          next_in_tag = nil
          previous_in_tag = nil
          if index
            if index < posts.length - 1
              next_in_tag = posts[index + 1]
            end
            if index > 0
              previous_in_tag = posts[index - 1]
            end
          end

          # This is rather inelegant; Ruby surely has a clearer way of doing this.

          if post.data["next_in"].nil?
            post.data["next_in"] = {}
          end

          if post.data["previous_in"].nil?
            post.data["previous_in"] = {}
          end

          post.data["next_in"][tag] = next_in_tag unless next_in_tag.nil?
          post.data["previous_in"][tag] = previous_in_tag unless previous_in_tag.nil?
        end
      end
    end
  end
end

Liquid::Template.register_filter(Jekyll::RSSURLFilter)