<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class BakerScorecard
{
    private int $handshakes = 0;
    private int $starBakers = 0;
    private int $technicalFirsts = 0;
    private int $technicalSeconds = 0;
    private int $technicalThirds = 0;
    private int $technicalLasts = 0;
    private bool $eliminated = false;

    public function __construct(public Baker $baker) {

    }

    /**
     * @return int
     */
    public function getHandshakes(): int
    {
        return $this->handshakes;
    }

    /**
     * @param int $handshakes
     * @return BakerScorecard
     */
    public function setHandshakes(int $handshakes): BakerScorecard
    {
        $this->handshakes = $handshakes;
        return $this;
    }

    public function incrementHandshakes(): void
    {
        $this->handshakes++;
    }

    /**
     * @return int
     */
    public function getStarBakers(): int
    {
        return $this->starBakers;
    }

    /**
     * @param int $starBakers
     * @return BakerScorecard
     */
    public function setStarBakers(int $starBakers): BakerScorecard
    {
        $this->starBakers = $starBakers;
        return $this;
    }

    public function incrementStarBakers(): void
    {
        $this->starBakers++;
    }

    /**
     * @return int
     */
    public function getTechnicalFirsts(): int
    {
        return $this->technicalFirsts;
    }

    /**
     * @param int $technicalFirsts
     * @return BakerScorecard
     */
    public function setTechnicalFirsts(int $technicalFirsts): BakerScorecard
    {
        $this->technicalFirsts = $technicalFirsts;
        return $this;
    }

    public function incrementTechnicalFirsts(): void
    {
        $this->technicalFirsts++;
    }

    /**
     * @return int
     */
    public function getTechnicalSeconds(): int
    {
        return $this->technicalSeconds;
    }

    /**
     * @param int $technicalSeconds
     * @return BakerScorecard
     */
    public function setTechnicalSeconds(int $technicalSeconds): BakerScorecard
    {
        $this->technicalSeconds = $technicalSeconds;
        return $this;
    }

    public function incrementTechnicalSeconds(): void
    {
        $this->technicalSeconds++;
    }

    /**
     * @return int
     */
    public function getTechnicalThirds(): int
    {
        return $this->technicalThirds;
    }

    /**
     * @param int $technicalThirds
     * @return Baker
     */
    public function setTechnicalThirds(int $technicalThirds): BakerScorecard
    {
        $this->technicalThirds = $technicalThirds;
        return $this;
    }

    public function incrementTechnicalThirds(): void
    {
        $this->technicalThirds++;
    }

    /**
     * @return int
     */
    public function getTechnicalLasts(): int
    {
        return $this->technicalLasts;
    }

    /**
     * @param int $technicalLasts
     * @return BakerScorecard
     */
    public function setTechnicalLasts(int $technicalLasts): BakerScorecard
    {
        $this->technicalLasts = $technicalLasts;
        return $this;
    }

    public function incrementTechnicalLasts(): void
    {
        $this->technicalLasts++;
    }

    /**
     * @return bool
     */
    public function isEliminated(): bool
    {
        return $this->eliminated;
    }

    /**
     * @param bool $eliminated
     * @return BakerScorecard
     */
    public function setEliminated(bool $eliminated): BakerScorecard
    {
        $this->eliminated = $eliminated;
        return $this;
    }

    public function getScore()
    {
        return $this->starBakers * 5
            + $this->technicalFirsts * 3
            + $this->technicalSeconds * 2
            + $this->technicalThirds
            + $this->technicalLasts * -2
            + $this->handshakes * 7;
    }

    public static function calculateFromEvents(Collection $events): \Illuminate\Support\Collection
    {
        $scorecards = collect();

        foreach ($events as $event) {

            $scorecard = $scorecards->get($event->baker->id);
            if (!$scorecard) {
                $scorecard = new BakerScorecard($event->baker);
                $scorecards->put($event->baker->id, $scorecard);
            }

            switch ($event->type) {
                case  Event::TYPE_STAR_BAKER:
                    $scorecard->incrementStarBakers();
                    break;
                case  Event::TECHNICAL_FIRST:
                    $scorecard->incrementTechnicalFirsts();
                    break;
                case  Event::TECHNICAL_SECOND:
                    $scorecard->incrementTechnicalSeconds();
                    break;
                case  Event::TECHNICAL_THIRD:
                    $scorecard->incrementTechnicalThirds();
                    break;
                case  Event::TECHNICAL_LAST:
                    $scorecard->incrementTechnicalLasts();
                    break;
                case  Event::ELIMINATED:
                    $scorecard->setEliminated(true);
                    break;
                case  Event::HANDSHAKES:
                    $scorecard->incrementHandshakes();
                    break;
            }
        }

        return $scorecards;
    }

}
