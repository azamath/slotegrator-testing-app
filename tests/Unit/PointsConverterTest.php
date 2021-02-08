<?php

namespace Tests\Unit;

use App\Models\PointsPrize;
use App\Models\User;
use App\Services\PointsConverter;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PointsConverterTest extends TestCase
{
    use DatabaseMigrations;

    public function testItConvertsCorrect()
    {
        $user = User::factory()->create([
            'name' => 'Azamat',
            'loyalty' => 512,
        ]);
        $pointsPrize = PointsPrize::factory()->create([
            'amount' => 256,
        ]);

        config()->set('prizes.points.convert_k', 10);

        $this->converter()
            ->setUser($user)
            ->setPointsPrize($pointsPrize)
            ->convert();

        $user->refresh();
        $pointsPrize->refresh();
        $this->assertEquals(512 + 256 * 10, $user->loyalty);
        $this->assertTrue($pointsPrize->is_converted);
    }

    protected function converter(): PointsConverter
    {
        return app(PointsConverter::class);
    }
}
