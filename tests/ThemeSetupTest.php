<?php

use PHPUnit\Framework\TestCase;

class ThemeSetupTest extends TestCase {
    public function test_classes_exist() {
        $this->assertTrue( class_exists( 'ColbyComms\\TwentyEighteen\\TwentyEighteen' ) );
        $this->assertTrue( class_exists( 'ColbyComms\\TwentyEighteen\\Shortcodes\\Section' ) );
    }
}