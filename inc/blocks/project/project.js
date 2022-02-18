( function( blocks, editor, element, components ) {
	var el = element.createElement;
    const { registerBlockType } = blocks;

	const { RichText, InspectorControls } = editor;
	const { Fragment } = element;
	const { TextControl, RangeControl, RadioControl, SelectControl, CheckboxControl, ToggleControl, Panel, PanelBody, PanelRow } = components;
	registerBlockType( 'devco/project', {
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
            },
            textColor: {
                type: 'string',
                default: "#333333"
            },
            list_id: {
                type: 'string',
                // default: '12345' // you can set a default value
            },
            range: {
                type: 'range'
            },
            doubleoptin: {
                type: 'boolean' // for ToggleControl we need boolean type
            }
        },
        // https://rudrastyh.com/gutenberg/inspector-controls.html
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
                        }),
                        el( PanelBody, { title: "test"}, 
                            el( TextControl, {
                                label: 'Textarea Control',
                                onChange: ( value ) => {
                                    props.setAttributes( { list_id: value } );
                                },
                                value: props.attributes.list_id,
                            }),
                            el( RangeControl,
                                {
                                    label: 'Range Control',
                                    min: 1,
                                    max: 100,
                                    onChange: ( value ) => {
                                        props.setAttributes( { range: value } );
                                    },
                                    value: props.attributes.range
                                }
                            ),
                            el( RadioControl,
                                {
                                    label: 'Bar Color',
                                    help: 'Some kind of description',
                                    options : [
                                        { label: 'Red', value: 'red' },
                                        { label: 'Cyan', value: 'cyan' },
                                        { label: 'Lime', value: 'lime' },
                                    ],
                                    onChange: ( value ) => {
                                        props.setAttributes( { color: value } );
                                    },
                                    selected: props.attributes.color
                                }
                            ),
                            el( ToggleControl,
                                {
                                    label: 'Double Opt In',
                                    onChange: ( value ) => {
                                        props.setAttributes( { doubleoptin: value } );
                                    },
                                    checked: props.attributes.doubleoptin,
                                }
                            ),
                            el( SelectControl,
                                {
                                    label: 'Select Control',
                                    options : [
                                        { label: 'Option 1', value: 'val_1' },
                                        { label: 'Option 2', value: 'val_2' },
                                    ],
                                    onChange: ( value ) => {
                                        props.setAttributes( { select_attr: value } );
                                    },
                                    value: props.attributes.select_attr
                                }
                            ),
                            el( CheckboxControl,
                                {
                                    label: 'Checkbox Control',
                                    onChange: ( value ) => {
                                        props.setAttributes( { doubleoptin: value } );
                                    },
                                    checked: props.attributes.doubleoptin,
                                }
                            ),
                        )
                    ),
                    el( 'div', { className: 'wp-block-devco-project' },
                        el( 'div', { className: 'chart' },
                            el('div', { className: `bar bar-${props.attributes.range} ${props.attributes.color}`}, 
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
                        el('p', 
                            { 
                                className: '',
                                value: props.attributes.range
                            }
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
                        el('div', { className: `bar bar-${props.attributes.range} ${props.attributes.color}`}, 
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
                    el('p', 
                        { 
                            className: '',
                            value: props.attributes.range
                        }
                    )
                )
            );
        }
	} );
} )( window.wp.blocks, window.wp.editor, window.wp.element, window.wp.components );