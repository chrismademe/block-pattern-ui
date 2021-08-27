<?php

$categories = bpui_get_pattern_categories();
$options = get_option( 'bpui_settings' );

$this->partial( 'header' );

?>

    <div class="bpui-container__inner">
        <?php $this->partial( 'page-header' ) ?>
        <h2>Settings</h2>
        <form class="bpui-form" action="options.php" method="post">
            <?php settings_fields( 'pluginPage' );  ?>

        <div class="bpui-form-field">
                <div class="bpui-form-field__label">
                    <label for="bpui_settings[bpui_default_category">Unregister Core Patterns</label>
                    <p>Checking this setting will remove all core block patterns. <em>This setting will not remove patterns registered by themes or other plugins.</em></p>
                </div>
                <div class="bpui-form-field__input">
                <input type='checkbox' name='bpui_settings[bpui_unregister_core_patterns]' <?php checked( $options['bpui_unregister_core_patterns'], 1 ); ?> value='1'>
                </div>
            </div>

            <div class="bpui-form-field">
                <div class="bpui-form-field__label">
                    <label for="bpui_settings[bpui_default_category">Default Category</label>
                    <p>Default category for new Block Patterns.</p>
                </div>
                <div class="bpui-form-field__input">
                    <select required class="bpui-select" name="bpui_settings[bpui_default_category][]" multiple>
                        <?php foreach ( $categories as $category ): ?>
                        <option value='<?php echo esc_attr( $category['name'] ) ?>' <?php echo in_array($category['name'], $options['bpui_default_category']) ? 'selected' : '' ?>><?php echo esc_html( $category['label'] ) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <footer class="bpui-form__footer">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"  />
            </footer>
        </form>
    </div>

<?php $this->partial( 'footer' ) ?>