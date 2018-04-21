var __bind = function(fn, me) { 
  return function() { 
    return fn.apply(me, arguments); 
  }; 
};

var OnlineStatus = function(options) {
  if (options === undefined) { options = {} }

  this.options   = options;
  this.online    = navigator.onLine;
  this.goOnline  = __bind( this.goOnline  , this );
  this.goOffline = __bind( this.goOffline , this );
  this.ready     = __bind( this.ready     , this );
  this.siteCheck = __bind( this.siteCheck , this );

  // Initialize
  if (window.jQuery) {
    this.load();
    $(this.ready);
  }
};

OnlineStatus.prototype.goOnline = function() {
  console.log('Online');
  // Update the check count in the footer
  this.updateCheckCount();
  // Update the online count in the footer
  this.updateOnlineCount();
  this.online = true;
  // Update the info box to change it to Online
  $('#notice').removeClass('offline').addClass('online');
  $('#notice > header').text('The Application is Online');
  $('#notice > section').text('You should be able to use the app as normal');
};

OnlineStatus.prototype.goOffline = function() {
  console.log('Offline');
  // Update the check count in the footer
  this.updateCheckCount();
  // Update the online count in the footer
  this.updateOfflineCount();
  this.online = false;
  // Update the info box to change it to Online
  $('#notice').removeClass('online').addClass('offline');
  $('#notice > header').text('The Application is Offline');
  $('#notice > section').text('You may experience issues with the application');
};

OnlineStatus.prototype.updateCheckCount = function() {
  count_span = $('#checks > span');
  if (count_span.length == 0) { return }
  current_count = parseInt(count_span.text());
  count_span.text( current_count + 1 );
};

OnlineStatus.prototype.updateOnlineCount = function() {
  count_span = $('#online > span');
  if (count_span.length == 0) { return }
  current_count = parseInt(count_span.text());
  count_span.text( current_count + 1 );
};

OnlineStatus.prototype.updateOfflineCount = function() {
  count_span = $('#offline > span');
  if (count_span.length == 0) { return }
  current_count = parseInt(count_span.text());
  count_span.text( current_count + 1 );
};

OnlineStatus.prototype.siteCheck = function() {
  console.log('Testing if online');
  // Make an ajax request for a very small text file on our site
  $.ajax({
    url: 'test.txt',
    timeout: 2000, // 2 seconds
    cache: false,
    success: this.goOnline,
    error: this.goOffline
  })
};

OnlineStatus.prototype.load = function() {
  console.log('Loaded');
  if (window.applicationCache.status == window.applicationCache.UPDATEREADY) {
    if (confirm('A new version of this site is available.  Load it?')) {
      window.location.reload();
    }
  }
};

OnlineStatus.prototype.ready = function() {
  console.log('All ready');
  // Check to see if our web site is avaialble
  this.siteCheck();
  // Setup binding for when the user goes online
  $(window).on( 'online', this.goOnline );
  // Setup binding for when the user goes offline
  $(window).on( 'offline', this.goOffline );
  // Check to see if we can reach our web site every 10 seconds
  setInterval(this.siteCheck, 10000);
};

new OnlineStatus();
