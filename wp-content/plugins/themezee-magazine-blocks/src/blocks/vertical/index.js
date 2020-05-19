/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { createBlock, registerBlockType } = wp.blocks;

/**
 * Internal dependencies
 */
import './style.scss';
import './editor.scss';
import blockAttributes from './attributes';
import edit from './edit';
import { IconMagazineVertical } from '../../components/data/icons';

/**
 * Register block
 */
registerBlockType(
	'themezee-magazine-blocks/vertical',
	{
		title: __( 'Magazine Vertical', 'themezee-magazine-blocks' ),

		description: __( 'Displays your latest posts in a vertical box.', 'themezee-magazine-blocks' ),

		category: 'themezee-magazine-blocks',

		icon: IconMagazineVertical,

		attributes: blockAttributes,

		keywords: [
			__( 'Posts', 'themezee-magazine-blocks' ),
			__( 'Box', 'themezee-magazine-blocks' ),
			__( 'ThemeZee', 'themezee-magazine-blocks' ),
		],

		supports: {
			html: false,
		},

		transforms: {
			to: [
				{
					type: 'block',
					blocks: [ 'themezee-magazine-blocks/columns' ],
					transform: ( attributes ) => {
						return createBlock(
							'themezee-magazine-blocks/columns',
							{},
							[
								createBlock( 'themezee-magazine-blocks/column', { ...attributes } ),
								createBlock( 'themezee-magazine-blocks/column', { ...attributes } ),
							],
						);
					},
				},
				{
					type: 'block',
					blocks: [ 'themezee-magazine-blocks/grid' ],
					transform: ( attributes ) => {
						return createBlock( 'themezee-magazine-blocks/grid', { ...attributes } );
					},
				},
				{
					type: 'block',
					blocks: [ 'themezee-magazine-blocks/horizontal' ],
					transform: ( attributes ) => {
						return createBlock( 'themezee-magazine-blocks/horizontal', { ...attributes } );
					},
				},
				{
					type: 'block',
					blocks: [ 'themezee-magazine-blocks/list' ],
					transform: ( attributes ) => {
						return createBlock( 'themezee-magazine-blocks/list', { ...attributes } );
					},
				},
			],
		},

		edit,

		// Block is rendered server-side.
		save: () => {},

		deprecated: [
			{
				attributes: {
					...blockAttributes,
					categories: {
						type: 'string',
					},
				},

				supports: {
					html: false,
				},

				migrate( oldAttributes ) {
					return {
						...oldAttributes,
						categories: [ oldAttributes.categories ].map( ( cat ) => parseInt( cat ) ),
					};
				},

				isEligible: ( { categories } ) => {
					return categories && 'string' === typeof categories;
				},

				save: () => {},
			},
		],
	},
);
