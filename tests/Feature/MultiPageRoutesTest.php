<?php

namespace Tests\Feature;

use Tests\TestCase;

class MultiPageRoutesTest extends TestCase
{
    /**
     * Test homepage status and content.
     */
    public function test_homepage_is_accessible(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('TBS Official Web Portal');
        $response->assertSee('五等分の花嫁');
    }

    /**
     * Test character list page.
     */
    public function test_characters_page_is_accessible(): void
    {
        $response = $this->get('/karakter');
        $response->assertStatus(200);
        $response->assertSee('CHARACTER SELECTOR');
        $response->assertSee('上杉 風太郎');
        $response->assertSee('中野 一花');
        $response->assertSee('中野 二乃');
        $response->assertSee('中野 三玖');
        $response->assertSee('中野 四葉');
        $response->assertSee('中野 五月');
    }

    /**
     * Test all valid character detail pages.
     */
    public function test_all_character_detail_pages_are_accessible(): void
    {
        $slugs = ['fuutarou', 'ichika', 'nino', 'miku', 'yotsuba', 'itsuki'];

        foreach ($slugs as $slug) {
            $response = $this->get('/karakter/' . $slug);
            $response->assertStatus(200);
            $response->assertSee('TBS Official Web Portal');
        }
    }

    /**
     * Test uppercase/mixed slug auto-redirects to lowercase.
     */
    public function test_uppercase_slug_redirects_to_lowercase(): void
    {
        $response = $this->get('/karakter/ITSUKI');
        $response->assertRedirect('/karakter/itsuki');

        $response2 = $this->get('/karakter/MiKu');
        $response2->assertRedirect('/karakter/miku');
    }

    /**
     * Test invalid character slug returns 404 page.
     */
    public function test_invalid_character_slug_returns_404(): void
    {
        $response = $this->get('/karakter/invalid-character-name');
        $response->assertStatus(404);
    }

    /**
     * Test gallery page.
     */
    public function test_gallery_page_is_accessible(): void
    {
        $response = $this->get('/galeri');
        $response->assertStatus(200);
        $response->assertSee('CHARACTER GALLERY');
    }

    /**
     * Test news page.
     */
    public function test_news_page_is_accessible(): void
    {
        $response = $this->get('/berita');
        $response->assertStatus(200);
        $response->assertSee('NEWS');
        $response->assertSee('@tbs_hanayome');
    }

    /**
     * Test onair/cast page.
     */
    public function test_onair_page_is_accessible(): void
    {
        $response = $this->get('/tayang');
        $response->assertStatus(200);
        $response->assertSee('CAST & ON AIR');
    }
}
