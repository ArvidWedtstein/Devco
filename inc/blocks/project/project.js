( function( blocks, editor, element ) {
	var el = element.createElement;
	blocks.registerBlockType( 'devco/project', {
		title: 'Project', // The title of block in editor.
		icon: 'text', // The icon of block in editor.
		category: 'common', // The category of block in editor.
		attributes: {
            color: {
                type: 'string',
                default: 'lime'
            },
            fill: {
                type: 'number',
                default: 1
            }
        },
		edit: function( props ) {
            return (
                <div { ...useBlockProps()}>
                    <InspectorControls>
                        <Panel>
                            <PanelBody title="Details">

                            </PanelBody>
                        </Panel>
                    </InspectorControls>
                </div>,
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
                            // el(
                            //     editor.RichText,
                            //     {
                            //         tagName: 'div',
                            //         className: "bg-red-400",
                            //         id: "red",
                            //         value: props.attributes.color,
                            //         onChange: function( content ) {
                            //             props.setAttributes( { color: content } );
                            //         }
                            //     }
                            // ),
                            el(
                                'select',
                                {
                                    value: props.attributes.color,
                                    onChange: function( content ) {
                                        props.setAttributes( { color: content } );
                                    }
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
        },
		save: function( props ) {
            return (
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
                                editor.RichText,
                                {
                                    tagName: 'div',
                                    className: "bg-red-400",
                                    id: "red",
                                    value: props.attributes.color,
                                    onChange: function( content ) {
                                        props.setAttributes( { color: content } );
                                    }
                                }
                            ),
                            el(
                                'input',
                                {
                                    className: "bg-red-400",
                                    id: "lime",
                                    value: props.attributes.fill,
                                    onChange: function( content ) {
                                        props.setAttributes( { fill: content } );
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