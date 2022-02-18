( function( blocks, editor, element, components ) {
	var el = element.createElement;
    const { registerBlockType } = blocks;

	const { RichText, InspectorControls } = editor;
	const { Fragment } = element;
	const { TextControl, RangeControl, RadioControl, SelectControl, CheckboxControl, ToggleControl, Panel, PanelBody, PanelRow } = components;
	
    registerBlockType( 'devco/ansatte', {
		title: 'Ansatte', // The title of block in editor.
		icon: 'text', // The icon of block in editor.
		category: 'common', // The category of block in editor.
		attributes: {
            ansatte: {
                type: 'array'
            }
        },
        // https://rudrastyh.com/gutenberg/inspector-controls.html
        // https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/
		edit: function( props ) {
            return (
                el( 'div', { className: 'wp-block-devco-ansatte' },
                    el(editor.RichText, 
                        { 
                            className: 'text-black',
                            tagName: 'span',
                            value: props.attributes.ansatte,
                        }
                    )
                )
            );
        },
		save: function( props ) {
            return (
                el( 'div', { className: 'wp-block-devco-ansatte' },
                    el(editor.RichText, 
                        { 
                            className: 'text-black',
                            tagName: 'span',
                            value: props.attributes.ansatte,
                        }
                    )
                )
            );
        }
	} );
} )( window.wp.blocks, window.wp.editor, window.wp.element, window.wp.components );