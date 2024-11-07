import { Fragment } from '@wordpress/element';
import { Panel, PanelBody, SelectControl } from '@wordpress/components';
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import { useSelect } from '@wordpress/data';
import './editor.scss';

const SelectControlTaxonomy = ( { attributes, setAttributes } ) => {

	const taxonomies = useSelect( select => select( 'core' ).getTaxonomies(), [] );

	return (
		<SelectControl
			value={ attributes.taxonomy }
			options={[
				{ label: '', value: ''},
				...taxonomies.map(taxonomy => ( { label: taxonomy.name, value: taxonomy.slug } ) )
			]}
			onChange={ taxonomy => setAttributes( { taxonomy } )}
			label='Taxonomy' />
	);
}

export default function Edit( { attributes, setAttributes, context } ) {

	const terms = useSelect( select =>
		attributes.taxonomy && context.postId ?
			select('core').getEntityRecords( 'taxonomy', attributes.taxonomy, { post: context.postId, per_page: -1 } )
		:
		[]
	, [attributes.taxonomy, context.postId] );

	return (
		<Fragment>
			<InspectorControls key='Settings'>
				<Panel>
					<PanelBody initialOpen={ true } title='Select taxonomy'>
						<SelectControlTaxonomy attributes={ attributes } setAttributes={ setAttributes } />
					</PanelBody>
				</Panel>
			</InspectorControls>
			<ul { ...useBlockProps() }>
				{
					terms && terms.length ?
						terms.map( term => <li key={ term.id }>{ term.name }</li>)
					:
					''
				}
			</ul>
		</Fragment>
	);
}