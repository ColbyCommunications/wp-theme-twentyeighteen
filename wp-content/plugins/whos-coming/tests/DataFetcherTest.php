<?php

use PHPUnit\Framework\TestCase;

use ColbyComms\WhosComing\DataFetcher;

class DataFetcherTest extends TestCase {
    public function test_format_csv() {
        $source = 'name,class_year
John Doe,2007
Jane Doe,2003';

        $expected = [
            [
                'name' => 'John Doe',
                'class_year' => '2007',
            ],
            [
                'name' => 'Jane Doe',
                'class_year' => '2003',
            ],
        ];

        $this->assertEquals(
            DataFetcher::format_csv( $source ),
            $expected
        );

        $source = 'name,class_year
John Doe,2007,

Jane Doe,2003';

        $expected = [
            [
                'name' => 'John Doe',
                'class_year' => '2007',
            ],
            [
                'name' => 'Jane Doe',
                'class_year' => '2003',
            ],
        ];

        $this->assertEquals(
            DataFetcher::format_csv( $source ),
            $expected
        );
    }

    public function test_format_json() {
        $source = '[{"name":"John Doe","class_year":"2007"},{"name":"Jane Doe","class_year":"2003"}]';

        $expected = [
            [
                'name' => 'John Doe',
                'class_year' => '2007',
            ],
            [
                'name' => 'Jane Doe',
                'class_year' => '2003',
            ],
        ];
        

        $this->assertEquals(
            DataFetcher::format_json( $source ),
            $expected
        );
    }
}