---
author: allen
comments: true
date: 2009-12-01 23:37:55
layout: post
slug: accessing-twitter-with-the-oauth-gem-and-rails
title: Accessing Twitter with the OAuth Gem and Rails
wordpress_id: 1269
categories:
- Article
tags:
- OAuth
- Ruby
- Twitter
- Unladen Follow
---

![Ruby is the only programming language I know of that gets away with a literal logo.](/images/wp-uploads/2009/12/ruby.png)OAuth is the authorization protocol that Twitter ((Other sites provide OAuth too. As a matter of fact, very few OAuth howtos use Twitter as an example, even though it's the highest profile user.)) provides to let third party apps use the Twitter API without seeing your Twitter password.

You might think the question "How do I use the OAuth Ruby gem to actually start an OAuth session with Twitter" would be easily answered on Google. It is not. There are a few reasons for this:





  * OAuth is new.


  * OAuth is changing.


  * Most documentation on OAuth is either excessively in-depth, or out of date.



The Readme of the oauth gem, as well as the [howto it links to on the topic](http://stakeventures.com/articles/2008/02/23/developing-oauth-clients-in-ruby) is from early 2008, which is millenia in OAuth years, and is written from the perspective of a persistent Ruby process rather than a web app.

From the comments in that article, a lot of people are having problems, so here's the current (as of late 2009) way I got it running:


    
    
      def login
        require 'oauth'
    
        consumer = get_consumer
    
        # Get a request token from Twitter
        @request_token = consumer.get_request_token :oauth_callback
            => ('http://' + request.env['HTTP_HOST'] + '/default/oauth/')
    
        # Store the request token's details for later
        session[:request_token] = @request_token.token
        session[:request_secret] = @request_token.secret
        
        # Hand off to Twitter so the user can authorize us
        redirect_to @request_token.authorize_url
      end
      
      def oauth
        require 'oauth'
    
        consumer = get_consumer
        
        # Re-create the request token
        @request_token = OAuth::RequestToken.new(consumer,
            session[:request_token], session[:request_secret])
        
        # Convert the request token to an access token using the verifier Twitter gave us
        @access_token = @request_token.get_access_token(:oauth_verifier =>
            params[:oauth_verifier])
    
        # Store the token and secret that we need to make API calls
        session[:oauth_token] = @access_token.token
        session[:oauth_secret] = @access_token.secret
    
        # Hand off to our app, which actually uses the API with the above token and secret
        redirect_to '/app/'
      end
    
      private
      
      def get_consumer
        OAuth::Consumer.new(
          YOUR_CONSUMER_KEY, 
          YOUR_CONSUMER_SECRET, 
          {:site => 'http://twitter.com'}
        )
      end
    



Some things to note that are different than other howtos out there:





  * The Twitter callback URL does not work anymore, even though their site lets you specify it.


  * The OAuth gem assumes you are running a persistent Ruby process, as opposed to something like Rails. It wants you to create an Access Token object and keep it around, but they can't be stored in a Rails session, so this is a pain.


  * You need to pass oauth_verifier to get_access_token. This apparently is a new requirement.



Alternatively, you can use a huge Twitter gem that does everything from OAuth to abstracting the Twitter API. I didn't do that because I love the feel of [Grackle](http://github.com/hayesdavis/grackle), which is a thin wrapper around the Twitter API that just passes through your API calls, meaning it doesn't need to be updated when the API changes, and it is very light weight.

If you have any tips on how to make my code more Rubylike, elegant, or have any other suggestions, please post a comment.
