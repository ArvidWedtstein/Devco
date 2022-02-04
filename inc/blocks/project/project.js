( function( blocks, editor, element ) {
	var el = element.createElement;
	blocks.registerBlockType( 'devco/project', {
		title: 'Project', // The title of block in editor.
		icon: 'text', // The icon of block in editor.
		category: 'common', // The category of block in editor.
		attributes: {
            content: {
                source: 'html',
                selector: 'h2',
            },
            color: {
                type: 'string',
                default: 'lime'
            },
            fill: {
                type: 'number',
                default: 1
            },
            textColor: {
                type: 'string',
                default: "#333333"
            },
        },
        // https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/
		edit: function( props ) {
            return (
                el(wp.element.Fragment, null, 
                    el(editor.InspectorControls, null,
                        el(editor.PanelColorSettings, {
                            title: wp.i18n.__("Color Settings", "devco"),
                            colorSettings: [
                                {
                                    label: wp.i18n.__("Text Color", "devco"),
                                    value: props.attributes.textColor,
                                    onChange: function( newColor ) {
                                        props.setAttributes({ textColor: newColor });
                                    }
                                }
                            ]
                        })
                    ),
                    el( 'div', { className: 'wp-block-devco-project' },
                        el( 'div', { className: 'chart' },
                            el('div', { className: `bar bar-${props.attributes.fill} ${props.attributes.color}`}, 
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
                                el(
                                    'select',
                                    {
                                        value: props.attributes.color,
                                        onChange: function( content ) {
                                            props.setAttributes( { color: content } );
                                        }, 
                                        style: {
                                            color: props.attributes.textColor
                                        },
                                    },
                                    el("option", {value: "red" }, "Red"),
                                    el("option", {value: "cyan" }, "Cyan"),
                                    el("option", {value: "lime" }, "Lime")
                                ),
                                el(
                                    'input',
                                    {
                                        className: "bg-red-400",
                                        id: "fill",
                                        value: props.attributes.fill,
                                        onChange: function( content ) {
                                            props.setAttributes( { fill: content.target.value } );
                                        }
                                    }
                                ),
                            ),
                        )
                    )
                )
                
            );
        },
		save: function( props ) {
            return (
                el( editor.RichText.Content, {
                    tagName: 'h2', 
                    value: props.attributes.content,
                    style: {
                        backgroundColor: props.attributes.backgroundColor,
                        color: props.attributes.textColor
                    },        
                }), 
                el( 'div', { className: 'wp-block-devco-project' },
                    el( 'div', { className: 'chart' },
                        el('div', { className: `bar bar-${props.attributes.fill} ${props.attributes.color}`}, 
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
                            el(
                                'select',
                                {
                                    value: props.attributes.color,
                                    onChange: function( content ) {
                                        props.setAttributes( { color: content } );
                                    }, 
                                    style: {
                                        color: props.attributes.textColor
                                    },
                                },
                                el("option", {value: "red" }, "Red"),
                                el("option", {value: "cyan" }, "Cyan"),
                                el("option", {value: "lime" }, "Lime")
                            ),
                            el(
                                'input',
                                {
                                    className: "bg-red-400",
                                    id: "fill",
                                    value: props.attributes.fill,
                                    onChange: function( content ) {
                                        props.setAttributes( { fill: content.target.value } );
                                    }
                                }
                            ),
                        ),
                    )
                )
            );
        }
	} );
} )( window.wp.blocks, window.wp.editor, window.wp.element );