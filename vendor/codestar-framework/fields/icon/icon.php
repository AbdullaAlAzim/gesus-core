<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: icon
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'CSF_Field_icon' ) ) {
  class CSF_Field_icon extends CSF_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $args = wp_parse_args( $this->field, array(
        'button_title' => esc_html__( 'Add Icon', 'csf' ),
        'remove_title' => esc_html__( 'Remove Icon', 'csf' ),
      ) );

      echo $this->field_before();

      $nonce  = wp_create_nonce( 'csf_icon_nonce' );
      $hidden = ( empty( $this->value ) ) ? ' hidden' : '';

      echo '<div class="csf-icon-select">';
      echo '<span class="csf-icon-preview'. esc_attr( $hidden ) .'"><i class="'. esc_attr( $this->value ) .'"></i></span>';
      echo '<a href="#" class="button button-primary csf-icon-add" data-nonce="'. esc_attr( $nonce ) .'">'. $args['button_title'] .'</a>';
      echo '<a href="#" class="button csf-warning-primary csf-icon-remove'. esc_attr( $hidden ) .'">'. $args['remove_title'] .'</a>';
      echo '<input type="text" name="'. esc_attr( $this->field_name() ) .'" value="'. esc_attr( $this->value ) .'" class="csf-icon-value"'. $this->field_attributes() .' />';
      echo '</div>';

      echo $this->field_after();

    }

    public function enqueue() {
      add_action( 'admin_footer', array( &$this, 'add_footer_gesusl_icon' ) );
      add_action( 'customize_controls_print_footer_scripts', array( &$this, 'add_footer_gesusl_icon' ) );
    }

    public function add_footer_gesusl_icon() {
    ?>
      <div id="csf-gesusl-icon" class="csf-gesusl csf-gesusl-icon hidden">
        <div class="csf-gesusl-table">
          <div class="csf-gesusl-table-cell">
            <div class="csf-gesusl-overlay"></div>
            <div class="csf-gesusl-inner">
              <div class="csf-gesusl-title">
                <?php esc_html_e( 'Add Icon', 'csf' ); ?>
                <div class="csf-gesusl-close csf-icon-close"></div>
              </div>
              <div class="csf-gesusl-header">
                <input type="text" placeholder="<?php esc_html_e( 'Search...', 'csf' ); ?>" class="csf-icon-search" />
              </div>
              <div class="csf-gesusl-content">
                <div class="csf-gesusl-loading"><div class="csf-loading"></div></div>
                <div class="csf-gesusl-load"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
    }

  }
}
