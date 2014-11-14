(function(e) {	
	tinymce.create('tinymce.plugins.roxShortcodeMce', {
		init : function(ed, url){
			tinymce.plugins.roxShortcodeMce.theurl = url;
		},
		createControl : function(btn, e) {
			if ( btn == "rox_shortcodes_button" ) {
				var a = this;	
				var btn = e.createSplitButton('rox_button', {
	                title: "Insert Shortcode",
					image: tinymce.plugins.roxShortcodeMce.theurl +"/images/shortcodes.png",
					icons: false,
	            });
	            btn.onRenderMenu.add(function (c, b) {
					
					b.add({title : 'rox Shortcodes', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
					
					
					// Columns
					c = b.addMenu({title:"Columns"});
					
						a.render( c, "One Half", "half" );
						a.render( c, "One Third", "third" );
						a.render( c, "One Fourth", "fourth" );
						a.render( c, "One Fifth", "fifth" );
						a.render( c, "One Sixth", "sixth" )
						
						c.addSeparator();		
								
						a.render( c, "Two Thirds", "twothird" );
						a.render( c, "Three Fourths", "threefourth" );
						a.render( c, "Two Fifths", "twofifth" );
						a.render( c, "Three Fifths", "threefifth" );
						a.render( c, "Fourth Fifths", "fourfifth" );
						a.render( c, "Five Sixths", "fivesixth" );
					
					b.addSeparator();
					
					
					// Elements
					c = b.addMenu({title:"Elements"});
									
						a.render( c, "Button", "button" );
						a.render( c, "Callout", "callout" );
						a.render( c, "Google Map", "googlemap" );
						a.render( c, "Heading", "heading" );
						a.render( c, "Pricing Table", "pricing" );
						a.render( c, "Skillbar", "skillbar" );
						a.render( c, "Icon", "icon" );
						a.render( c, "Contact Address", "rox_contacts" );	
						a.render( c, "Social Icon", "social" );	
						a.render( c, "Testimonial", "testimonial" );
						a.render( c, "All Clients", "all_clients" );
						a.render( c, "Services", "rox_services" );
						a.render( c, "Recent Posts", "recent_posts" );
						a.render( c, "Recent Products", "recent_product" );
						a.render( c, "Feature Products", "featured_product" );
						a.render( c, "Skillbar Circle", "rox_expert" );
						a.render( c, "FAQ", "rox_faq" );
												
						b.addSeparator();
					
					c = b.addMenu({title:"Embed Media"});
						a.render( c, "Youtube", "youtube" );
						a.render( c, "Vimeo", "vimeo" );
						a.render( c, "Soundcloud", "soundcloud" );						
						b.addSeparator();

					c = b.addMenu({title:"Lightbox"});
						a.render( c, "Image", "image_lightbox" );
						a.render( c, "Content", "content_lightbox" );
						a.render( c, "Youtube Video", "youtube_lightbox" );
						a.render( c, "Vimeo Video", "vimeo_lightbox" );						
						b.addSeparator();	


					// Boxes
					c = b.addMenu({title:"Boxes"});
					
						a.render( c, "Blue", "blueBox" );
						a.render( c, "Gray", "grayBox" );
						a.render( c, "Green", "greenBox" );
						a.render( c, "Red", "redBox" );
						a.render( c, "Yellow", "yellowBox" );
						
					b.addSeparator();
					
					// Highlights
					c = b.addMenu({title:"Highlights"});
					
						a.render( c, "Blue", "blueHighlight" );
						a.render( c, "Gray", "grayHighlight" );
						a.render( c, "Green", "greenHighlight" );
						a.render( c, "Red", "redHighlight" );
						a.render( c, "Yellow", "yellowHighlight" );
						
					b.addSeparator();
					
					
					// Dividers
					c = b.addMenu({title:"Dividers"});
					
						a.render( c, "Solid", "solidDivider" );
						a.render( c, "Dashed", "dashedDivider" );
						a.render( c, "Dotted", "dottedDivider" );
						a.render( c, "Double", "doubleDivider" );
						a.render( c, "FadeIn", "fadeinDivider" );
						a.render( c, "FadeOut", "fadeoutDivider" );
						
					b.addSeparator();
					
					
					// jQuery
					c = b.addMenu({title:"jQuery"});
					
						a.render( c, "Accordion", "accordion" );
						a.render( c, "Tabs", "tabs" );
						a.render( c, "Toggle", "toggle" );
					
					c.addSeparator();
					
					
					// Helpers
					c = b.addMenu({title:"Other"});
						a.render( c, "Banner", "banner" );
						a.render( c, "Spacing", "spacing" );
						a.render( c, "Clear Floats", "clear" );
						
					c.addSeparator();	
					
					
				});
	            
	          return btn;
			}
			return null;               
		},
		render : function(ed, title, id) {
			ed.add({
				title: title,
				onclick: function () {
					
					// Selected content
					var mceSelected = tinyMCE.activeEditor.selection.getContent();
					
					// Add highlighted content inside the shortcode when possible - yay!
					if ( mceSelected ) {
						var roxDummyContent = mceSelected;
					} else {
						var roxDummyContent = 'Sample Content';
					}
					
					// Accordion
					if(id == "accordion") {
						tinyMCE.activeEditor.selection.setContent('[rox_accordion]<br />[rox_accordion_section title="Section 1"]<br />Accordion Content<br />[/rox_accordion_section]<br />[rox_accordion_section title="Section 2"]<br />Accordion Content<br />[/rox_accordion_section]<br />[/rox_accordion]');
					}
					
					
					
					
					// Boxes
					if(id == "blueBox") {
						tinyMCE.activeEditor.selection.setContent('[rox_box color="blue" text_align="left" width="100%" float="none"]<br />' + roxDummyContent + '<br />[/rox_box]');
					}
					if(id == "grayBox") {
						tinyMCE.activeEditor.selection.setContent('[rox_box color="gray" text_align="left" width="100%" float="none"]<br />' + roxDummyContent + '<br />[/rox_box]');
					}
					if(id == "greenBox") {
						tinyMCE.activeEditor.selection.setContent('[rox_box color="green" text_align="left" width="100%" float="none"]<br />' + roxDummyContent + '<br />[/rox_box]');
					}
					if(id == "redBox") {
						tinyMCE.activeEditor.selection.setContent('[rox_box color="red" text_align="left" width="100%" float="none"]<br />' + roxDummyContent + '<br />[/rox_box]');
					}
					if(id == "yellowBox") {
						tinyMCE.activeEditor.selection.setContent('[rox_box color="yellow" text_align="left" width="100%" float="none"]<br />' + roxDummyContent + '<br />[/rox_box]');
					}
					
					
					
					
					// Button
					if(id == "button") {
						tinyMCE.activeEditor.selection.setContent('[rox_button color="blue" url="http://www.ThemeRox.com" title="Visit Site" target="blank" border_radius=""]' + roxDummyContent + '[/rox_button]');
					}
					
					
					
					
					// Clear Floats
					if(id == "clear") {
						tinyMCE.activeEditor.selection.setContent('[rox_clear_floats]');
					}
					
					
					
					
					// Callout
					if(id == "callout") {
						tinyMCE.activeEditor.selection.setContent('[rox_callout button_text="button text" button_color="" button_url="http://www.ThemeRox.com" button_rel="nofollow"]' + roxDummyContent + '[/rox_callout]');
					}
					
					
					
					
					// Columns
					if(id == "half") {
						tinyMCE.activeEditor.selection.setContent('[rox_column size="one-half" position="first"]<br />' + roxDummyContent + '<br />[/rox_column]');
					}
					if(id == "third") {
						tinyMCE.activeEditor.selection.setContent('[rox_column size="one-third" position="first"]' + roxDummyContent + '[/rox_column]');
					}
					if(id == "fourth") {
						tinyMCE.activeEditor.selection.setContent('[rox_column size="one-fourth" position="first"]' + roxDummyContent + '[/rox_column]');
					}
					if(id == "fifth") {
						tinyMCE.activeEditor.selection.setContent('[rox_column size="one-fifth" position="first"]' + roxDummyContent + '[/rox_column]');
					}
					if(id == "sixth") {
						tinyMCE.activeEditor.selection.setContent('[rox_column size="one-sixth" position="first"]' + roxDummyContent + '[/rox_column]');
					}
					
					
					if(id == "twothird") {
						tinyMCE.activeEditor.selection.setContent('[rox_column size="two-third" position="first"]' + roxDummyContent + '[/rox_column]');
					}
					if(id == "threefourth") {
						tinyMCE.activeEditor.selection.setContent('[rox_column size="three-fourth" position="first"]' + roxDummyContent + '[/rox_column]');
					}
					if(id == "twofifth") {
						tinyMCE.activeEditor.selection.setContent('[rox_column size="two-fifth" position="first"]' + roxDummyContent + '[/rox_column]');
					}
					if(id == "threefifth") {
						tinyMCE.activeEditor.selection.setContent('[rox_column size="three-fifth" position="first"]' + roxDummyContent + '[/rox_column]');
					}
					if(id == "fourfifth") {
						tinyMCE.activeEditor.selection.setContent('[rox_column size="four-fifth" position="first"]' + roxDummyContent + '[/rox_column]');
					}
					if(id == "fivesixth") {
						tinyMCE.activeEditor.selection.setContent('[rox_column size="five-sixth" position="first"]' + roxDummyContent + '[/rox_column]');
					}	
					
									
				
					// Divider
					if(id == "solidDivider") {
						tinyMCE.activeEditor.selection.setContent('[rox_divider style="solid" margin_top="20px" margin_bottom="20px"]');
					}
					if(id == "dashedDivider") {
						tinyMCE.activeEditor.selection.setContent('[rox_divider style="dashed" margin_top="20px" margin_bottom="20px"]');
					}
					if(id == "dottedDivider") {
						tinyMCE.activeEditor.selection.setContent('[rox_divider style="dotted" margin_top="20px" margin_bottom="20px"]');
					}
					if(id == "doubleDivider") {
						tinyMCE.activeEditor.selection.setContent('[rox_divider style="double" margin_top="20px" margin_bottom="20px"]');
					}
					if(id == "fadeinDivider") {
						tinyMCE.activeEditor.selection.setContent('[rox_divider style="fadein" margin_top="20px" margin_bottom="20px"]');
					}
					if(id == "fadeoutDivider") {
						tinyMCE.activeEditor.selection.setContent('[rox_divider style="fadeout" margin_top="20px" margin_bottom="20px"]');
					}
					
					
					
					
					// Google Map
					if(id == "googlemap") {
						tinyMCE.activeEditor.selection.setContent('[rox_googlemap title="Envato Office" location="2 Elizabeth St, Melbourne Victoria 3000 Australia" zoom="10" height=250]');
					}
					
					// All Clients
					if(id == "all_clients") {
						tinyMCE.activeEditor.selection.setContent('[rox_client_details title=""]');
					}
					
					if(id == "rox_contacts") {
						tinyMCE.activeEditor.selection.setContent('[rox_contacts_in title="Office Address"][rox_contacts title = "Head office" col="3" desc = "Lorem ipsum has erroribus is design color vituperata ex, bonorum depend an you" phone = "9878878" fax = "88755675765" email = "test@test.com" ][/rox_contacts_in]');
					}
					
					
					
					// Services
					if(id == "rox_services") {
						tinyMCE.activeEditor.selection.setContent('[rox_services title="" column="3" showposts="6"]');
					}
					
					
					// Recent Posts
					if(id == "recent_posts") {
						tinyMCE.activeEditor.selection.setContent('[recent_posts_slider title="Recent Posts" post_type="post" showposts="5" cat="" style="style5"]');
					}
					
					// Recent Products
					if(id == "recent_product") {
						tinyMCE.activeEditor.selection.setContent('[recent_product title="Recent products" per_page="8" columns="4" orderby="date" order="desc"]');
					}

					// Featured products
					if(id == "featured_product") {
						tinyMCE.activeEditor.selection.setContent('[featured_product title="Featured products" per_page="8" columns="4" orderby="date" order="desc"]');
					}
					
					// Expert
					if(id == "rox_expert") {
						tinyMCE.activeEditor.selection.setContent('[rox_expert_in title="We Expert In" desc="' + roxDummyContent + '"][rox_expert title="Wordpress" value="50" col="4"]' + roxDummyContent + '[/rox_expert][rox_expert title="joomla" value="50" col="4"]' + roxDummyContent + '[/rox_expert][rox_expert title="SEO" value="50" col="4"]' + roxDummyContent + '[/rox_expert][rox_expert title="marketing" value="50" col="4"]' + roxDummyContent + '[/rox_expert][/rox_expert_in]');
					}
					
					// Recent Posts Large
					if(id == "rox_faq") {
						tinyMCE.activeEditor.selection.setContent('[rox_faq title="FAQ"]' + roxDummyContent + '[/rox_faq]');
					}
					
					

					// youtube
					if(id == "youtube") {
						tinyMCE.activeEditor.selection.setContent('[rox_youtube id="OdIJ2x3nxzQ" width="600" height="360"]');
					}
					// Vimeo
					if(id == "vimeo") {
						tinyMCE.activeEditor.selection.setContent('[rox_vimeo id="44193401" width="600" height="360"]');
					}
					// soundcloud
					if(id == "soundcloud") {
						tinyMCE.activeEditor.selection.setContent('[rox_soundcloud url="//soundcloud.com/nature-sounds/laughing-kookaburra-dacelo-novaeguineae" width="100%" height="81" auto_play="true" comments="true" color="ff7700"');
					}


					// Image Lightbox
					if(id == "image_lightbox") {
						tinyMCE.activeEditor.selection.setContent('[rox_image_lightbox fullimage="http://www.themerox.com/logo.png" thumbimage="http://www.themerox.com/logo.png" width="80" height="80" title="Themerox" description="Quality Templates"]');
					}
					// Content Lightbox
					if(id == "content_lightbox") {
						tinyMCE.activeEditor.selection.setContent('[rox_content_lightbox id="popupcontent" title="Title" content="Content goes here"]');
					}
					// Youtube Lightbox
					if(id == "youtube_lightbox") {
						tinyMCE.activeEditor.selection.setContent('[rox_youtube_lightbox video_id="OdIJ2x3nxzQ" width=640 height=480 anchor="Here is a youtube video Link. " auto_thumb="1"]');
					}
					// Vimeo Lightbox
					if(id == "vimeo_lightbox") {
						tinyMCE.activeEditor.selection.setContent('[rox_vimeo_lightbox video_id="44193401" width=640 height=480 anchor="Here is a vimeo video Link. " auto_thumb="0"]');
					}
					
					
					
					// Heading
					if(id == "heading") {
						tinyMCE.activeEditor.selection.setContent('[rox_heading type="h2" title="' + roxDummyContent + '" margin_top="20px;" margin_bottom="20px" text_align="left"]');
					}
					if(id == "banner") {
						tinyMCE.activeEditor.selection.setContent('[offer-banner title="Summer sale on" type="discount/sale" button_text="Join now" button_link="#"  image_url=""]Free[/offer-banner]');
					}
					
					
					
					
					
					// Highlight
					if(id == "blueHighlight") {
						tinyMCE.activeEditor.selection.setContent('[rox_highlight color="blue"]' + roxDummyContent + '[/rox_highlight]');
					}
					if(id == "grayHighlight") {
						tinyMCE.activeEditor.selection.setContent('[rox_highlight color="gray"]' + roxDummyContent + '[/rox_highlight]');
					}
					if(id == "greenHighlight") {
						tinyMCE.activeEditor.selection.setContent('[rox_highlight color="green"]' + roxDummyContent + '[/rox_highlight]');
					}
					if(id == "redHighlight") {
						tinyMCE.activeEditor.selection.setContent('[rox_highlight color="red"]' + roxDummyContent + '[/rox_highlight]');
					}
					if(id == "yellowHighlight") {
						tinyMCE.activeEditor.selection.setContent('[rox_highlight color="yellow"]' + roxDummyContent + '[/rox_highlight]');
					}					
					
					
					
					// Pricing
					if(id == "pricing") {
						tinyMCE.activeEditor.selection.setContent('[rox_pricing_table]<br />[rox_pricing size="one-half" plan="Free" cost="$0" per="per month" button_url="#" button_text="Sign Up" button_color="gold" button_border_radius="" button_target="self" button_rel="nofollow" position=""]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/rox_pricing]<br /><br />[rox_pricing size="one-half" position="last" featured="yes" plan="Basic" cost="$19.99" per="per month" button_url="#" button_text="Sign Up" button_color="gold" button_border_radius="" button_target="self" button_rel="nofollow"]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/rox_pricing]<br />[/rox_pricing_table]');
					}
					
					
					
					
					//Spacing
					if(id == "spacing") {
						tinyMCE.activeEditor.selection.setContent('[rox_spacing size="40px"]');
					}
					
					
					
					//Icon
					if(id == "icon") {
						tinyMCE.activeEditor.selection.setContent('[rox_icon type="umbrella" size="2x" rotate="" flip="" pull="" animated=""]');
					}
					//Social
					if(id == "social") {
						tinyMCE.activeEditor.selection.setContent('[rox_social icon="twitter" url="http://www.twitter.com/ThemeRox" title="Follow Us" target="self" rel=""]');
					}
					
					
					
					
					//Skillbar
					if(id == "skillbar") {
						tinyMCE.activeEditor.selection.setContent('[rox_skillbar title="' + roxDummyContent + '" percentage="100" color="#6adcfa"]');
					}
					
					
					
					
					//Tabs
					if(id == "tabs") {
						tinyMCE.activeEditor.selection.setContent('[rox_tabgroup title="" type="vertical" icons="picture,coffee,glass,home"][rox_tab title="First Tab"]' + roxDummyContent + '[/rox_tab][rox_tab title="Second Tab"]' + roxDummyContent + '[/rox_tab][rox_tab title="Third Tab"]' + roxDummyContent + '[/rox_tab][rox_tab title="Forth Tab"]' + roxDummyContent + '[/rox_tab][/rox_tabgroup]');
					}
					
					
					
					//Testimonial
					if(id == "testimonial") {
						tinyMCE.activeEditor.selection.setContent('[rox_testimonial_in title="" desc=""][rox_testimonial by="ThemeRox" image_url="" designation="CEO" col="1"]' + roxDummyContent + '[/rox_testimonial][/rox_testimonial_in]');
					}
					
					
					
					//Toggle
					if(id == "toggle") {
						tinyMCE.activeEditor.selection.setContent('[rox_toggle title="This Is Your Toggle Title"]' + roxDummyContent + '[/rox_toggle]');
					}
					
					
					return false;
				}
			})
		}
	
	});
	tinymce.PluginManager.add("rox_shortcodes", tinymce.plugins.roxShortcodeMce);
})();