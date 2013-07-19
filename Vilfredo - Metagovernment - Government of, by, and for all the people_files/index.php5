/* generated javascript */
var skin = 'monobook';
var stylepath = '/w/skins';

/* MediaWiki:Common.js */
// Common scripting for all users, all skins.  See also:
//
//   * http://www.mediawiki.org/wiki/JavaScript - JavaScript in MediaWiki.
//   * mediawiki/skins/common/*.js - some of which are core scripts loaded by MediaWiki.
//
// Do not depend on MediaWiki's mw.loader or importScriptURI to load scripts
// synchronously.  It adds the script elements using the DOM, which causes the scripts
// themselves to load asynchronously.
//

// Crossforum Theatre stage of Votorola, for remote drafting.
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// module.css and gwt.js must load before boot script nocache.js
// http://zelea.com/project/votorola/_/javadoc/votorola/s/gwt/mediawiki/MediaWikiIn.html

  /*@cc_on @if( false ) @*/ // all but IE [1]
  voInject = function()  // implicitly declared so deletable below
  {
      var head = null; // till found
      for( n = document.documentElement.firstChild; n != null; n = n.nextSibling )
      {
          if( n.nodeType != /*Node.ELEMENT_NODE*/1 ) continue;

          if( n.nodeName.toUpperCase() != 'HEAD' ) continue;

          head = n;
          break;
      }
      var toInject = false;
      for( var c = wgCategories.length - 1; c >=0; --c )
      {
          var category = wgCategories[c];
          if( category == 'Remote draft' )
          {
              toInject = true; // inject regardless for a remote draft page
              break;
          }
      }
      if( toInject )
      {
          if( !window.voGWTConfig ) voGWTConfig = {};
          else if( window.voGWTConfig.s_gwt_mediawiki_isInjected ) return;
            // guard against double injection by both admin and user scripts

          window.voGWTConfig.s_gwt_mediawiki_isInjected = true;
          window.voGWTConfig.s_gwt_mediawiki_toTop = true;
          var context = 'http://zelea.com/y/vw';
          document.write( "<link href='" + context // [2]
            + "/mediawiki/module.css' rel='stylesheet' type='text/css'/>" );
          document.write( "<script src='" + context // [3]
            + "/w/publicConfig/gwt.js' type='text/javascript'></script>" );
          document.write( "<script src='" + context // [3]
            + "/votorola.s.gwt.mediawiki.MediaWikiIn/votorola.s.gwt.mediawiki.MediaWikiIn.nocache.js'"
            + " type='text/javascript'></script>" );
      }
  }
  voInject();
  delete voInject; // clean up
  /*@end @*/

//
// NOTES
//
//   [1] IE excluded by conditional compilation in MediaWiki 16 and earlier, thus:
//
//          /*@cc_on @if( false ) @*/
//          /*@end @*/
//
//       And by JQuery in MediaWiki 17 and later, thus:
//
//          if( $.client.profile().name != 'msie' )
//
//   [2] For MediaWiki 16 and earlier, would ordinarily use: importStylesheetURI( URL )
//       For MediaWiki 17 and later: mw.loader.load( URL, 'text/css' )
//       http://www.mediawiki.org/wiki/ResourceLoader/Migration_guide_%28users%29
//
//       But instead write to ensure CSS link element precedes script element, else layout
//       may be unstable: http://mail.zelea.com/list/votorola/2012-November/001540.html
//
//   [3] Scripts might instead be inject asynchronously using MediaWiki's mw.loader or
//       importScriptURI.  We are no longer using the old cross-site linker ('xs') that
//       writes to the document.  But asynchronous injection has not been tested yet.
//

/* MediaWiki:Monobook.js */
/* Any JavaScript here will be loaded for users using the MonoBook skin */