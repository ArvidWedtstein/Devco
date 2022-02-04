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
		edit: function( props ) {
            return (
                el( 'div', { className: 'wp-block-devco-project' },
                    el( 'div', { className: 'chart' },
                        el('div', { className: 'bar bar-50 red'}, 
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
                    ),
                    el('div', { className: 'actions'}, 
                        el('label', { for: 'red', value: 'Red'}),
                        el('label', { for: 'cyan', value: 'Cyan'}),
                        el('label', { for: 'lime', value: 'Lime'}),
                        el('input', { id: 'red', type: "radio", name: 'switch-color'}),
                        el('input', { id: 'cyan', type: "radio", name: 'switch-color'}),
                        el('input', { id: 'lime', type: "radio", name: 'switch-color'}),
                    )
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