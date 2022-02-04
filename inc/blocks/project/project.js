( function( blocks, editor, element ) {
	var el = element.createElement;

	blocks.registerBlockType( 'devco/project', {
		title: 'Project', // The title of block in editor.
		icon: 'dashicons-schedule', // The icon of block in editor.
		category: 'common', // The category of block in editor.
		attributes: {
            content: {
                type: 'string',
                default: 'ttttttt customize web-enabled supply chains and turnkey collaboration and idea-sharing Assertively cultivate.'
            },
            button: {
                type: 'string',
                default: 'Join Today'
            }
        },
        /*<div class="chart">
            <div class="bar bar-30 white">
              <div class="face top">
                  <div class="growing-bar"></div>
              </div>
              <div class="face side-0">
                  <div class="growing-bar"></div>
              </div>
              <div class="face floor">
                  <div class="growing-bar"></div>
              </div>
              <div class="face side-a"></div>
              <div class="face side-b"></div>
              <div class="face side-1">
                  <div class="growing-bar"></div>
              </div>
            </div>
          </div>*/
		edit: function( props ) {
            return (
                el( 'div', { className: 'devco-chart' },
                    el('div', { className: 'bar bar-30 red'}, 
                        el('div', { className: 'face top'},
                            el('div', { className: 'growing-bar'})
                        ),
                        el('div', { className: 'face side-0'},
                            el('div', { className: 'growing-bar'})
                        ),
                        el('div', { className: 'face floor'},
                            el('div', { className: 'growing-bar'})
                        ),
                        el('div', { className: 'face side-a'}),
                        el('div', { className: 'face side-b'}),
                        el('div', { className: 'face side-1'},
                            el('div', { className: 'growing-bar'})
                        ),
                    ),
                    // el(
                        
                    //     editor.RichText,
                    //     {
                    //         tagName: 'div',
                    //         className: 'devco-chart',
                    //         value: props.attributes.content,
                    //         onChange: function( content ) {
                    //             props.setAttributes( { content: content } );
                    //         }
                    //     },
                        
                    // ),
                    el(
                        editor.RichText,
                        {
                            tagName: 'span',
                            className: 'devco-project-button',
                            value: props.attributes.button,
                            onChange: function( content ) {
                                props.setAttributes( { button: content } );
                            }
                        }
                    ),
                )
            );
        },
		save: function( props ) {
            return (
                el( 'div', { className: props.className },
                    el( editor.RichText.Content, {
                        tagName: 'p',
                        className: 'devco-project-content',
                        value: props.attributes.content,
                    } ),
                    el( 'button', { className: 'devco-project-button' },
                        props.attributes.button
                    )
                )
            );
        },
	} );
} )( window.wp.blocks, window.wp.editor, window.wp.element );