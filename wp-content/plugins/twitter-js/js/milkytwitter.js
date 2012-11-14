function getTweets(target, term, filter, limit, blank, lang) {
	twitterlib.cache();
	twitterlib.reset();
	var opt = {};
  if (filter) opt.filter = filter;
  if (limit !== null) opt.limit = limit;
	if (term == null) console.log('Twitter ID is missing');
	if (target == null) console.log('Target is missing');
	if (blank == null) blank = true;
	if (lang == null) lang = 'fr';  
	
	twitterlib.timeline(term, opt, function(tweets) {
  	var template = '%text% <a href="http://twitter.com/%user_screen_name%/statuses/%id_str%/">%time%</a>';
    var html = ['<ul>'];
    for (var i = 0; i < tweets.length; i++) {
      tweets[i].time = twitterlib.time.relative(tweets[i].created_at);
      for (var key in tweets[i].user) {
          tweets[i]['user_' + key] = tweets[i].user[key];
      }
			html.push('<li>' + template.replace(/%([a-z_\-\.]*)%/ig, function (m, l) {
              var r = tweets[i][l] + "" || "";
              if (l == 'text') r = twitterlib.expandLinks(tweets[i]);
              if (l == 'text') r = twitterlib.ify.clean(r);
              if (l == 'time' && lang == 'fr') r = r.replace(/(.*) (.*)(s?) ago$/,'Il y a $1 $2$3').replace(/hour/,'heure').replace(/second/,'seconde');
              return r;
            }));
    }
    html.push('</ul>');
    console.log(tweets.length+' tweets loaded');
		jQuery('#'+target).empty();
  	jQuery('#'+target).html(html.join(''));
		if (blank) jQuery('#'+target+' a').click(function(){window.open(this.href);return false;});
	});
}