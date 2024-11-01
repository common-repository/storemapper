/**
 * Add a Storemapper button to the WordPress editor allowing the
 * user to insert a shortcode into content at the cursor.
 *
 * The user will be prompted to enter an optional title
 * and title tag via a form prompt before shortcode insertion.
 */
( function() {
	tinymce.PluginManager.add( "wpStoremapper", function( editor, url ) {
		editor.addButton( "wpStoremapper", {
			title: "Insert Storemapper Shortcode",
			cmd: "wpStoremapper",
			image: wpStoremapperBaseUrl + "assets/img/storemapper_icon.png",
			onClick: function( e ) {
				editor.windowManager.open( {
					title: "Storemapper Shortcode Parameters (Optional)",
					body: [
						{
							type: "textbox",
							id: "storemapper-shortcode-title",
							name: "shortcodeTitle",
							placeholder: "Enter a title",
							multiline: false,
							minWidth: 500,
							label: 'Title'
						},
						{
							type: "textbox",
							id: "storemapper-shortcode-title-tag",
							name: "shortcodeTitleTag",
							placeholder: "Enter a HTML title tag (ex. h3) - default is 'h2'",
							multiline: false,
							minWidth: 500,
							label: 'HTML Title Tag'
						}
					],
					onsubmit: function( e ) {
						var shortcodeTitle = "",
							shortcodeTitleTag = "";
						if ( e.data.shortcodeTitle.length ) {
							shortcodeTitle = " title=\"" + e.data.shortcodeTitle + "\"";
						}
						if ( e.data.shortcodeTitleTag.length ) {
							shortcodeTitleTag = " title_tag=\"" + e.data.shortcodeTitleTag + "\"";
						}
						editor.insertContent( "[wp-storemapper" + shortcodeTitle + shortcodeTitleTag + "]" );
					}
				} );
				tinymce.get( "storemapper-shortcode-title" ).focus();
			}
		} );
	} );
} )();
