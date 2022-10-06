<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class Scorecard
{
    private int $handshakes = 0;
    private int $starBakers = 0;
    private int $technicalFirsts = 0;
    private int $technicalSeconds = 0;
    private int $technicalThirds = 0;
    private int $technicalLasts = 0;
    private bool $raisingAgent = false;
    private bool $eliminated = false;

    private int $score = 0;

    public function __construct()
    {

    }

    public static function calculateFromEvents(Collection $events): \Illuminate\Support\Collection
    {
        $scorecards = collect();

        foreach ($events as $event) {

            $bakersScorecards = $scorecards->get($event->baker->id);
            if (!$bakersScorecards) {
                $bakersScorecards = collect();
                $scorecards->put($event->baker->id, $bakersScorecards);
            }

            $scorecard = $bakersScorecards->get($event->week->id);
            if (!$scorecard) {
                $scorecard = new Scorecard();
                $bakersScorecards->put($event->week->id, $scorecard);
            }

            switch ($event->type) {
                case Event::TYPE_STAR_BAKER:
                    $scorecard->incrementStarBakers();
                    break;
                case Event::TYPE_TECHNICAL_FIRST:
                    $scorecard->incrementTechnicalFirsts();
                    break;
                case Event::TYPE_TECHNICAL_SECOND:
                    $scorecard->incrementTechnicalSeconds();
                    break;
                case Event::TYPE_TECHNICAL_THIRD:
                    $scorecard->incrementTechnicalThirds();
                    break;
                case Event::TYPE_TECHNICAL_LAST:
                    $scorecard->incrementTechnicalLasts();
                    break;
                case Event::TYPE_ELIMINATED:
                    $scorecard->setEliminated(true);
                    break;
                case Event::TYPE_HANDSHAKE:
                    $scorecard->incrementHandshakes();
                    break;
                case Event::TYPE_RAISING_AGENT:
                    $scorecard->setRaisingAgent(true);
                    Log::debug("Setting raising agent for $event->id " . $event->user->username . " for week " . $event->week->week_num);
                    break;
            }
        }

        $aggregates = $scorecards->map(function ($bakersScorecards) {
            foreach ($bakersScorecards as $scorecard) {
                $scorecard->calculateScore();
            }
            $aggregate = self::aggregate($bakersScorecards);
            return $aggregate;
        });

        return $aggregates;
    }

    public function incrementStarBakers(): void
    {
        $this->starBakers++;
    }

    public function incrementTechnicalFirsts(): void
    {
        $this->technicalFirsts++;
    }

    public function incrementTechnicalSeconds(): void
    {
        $this->technicalSeconds++;
    }

    public function incrementTechnicalThirds(): void
    {
        $this->technicalThirds++;
    }

    public function incrementTechnicalLasts(): void
    {
        $this->technicalLasts++;
    }

    public function incrementHandshakes(): void
    {
        $this->handshakes++;
    }

    /**
     * @param bool $raisingAgent
     * @return Scorecard
     */
    public function setRaisingAgent(bool $raisingAgent): Scorecard
    {
        $this->raisingAgent = $raisingAgent;
        return $this;
    }

    public function isRaisingAgent(): bool
    {
        return $this->raisingAgent;
    }

    public static function aggregate(\Illuminate\Support\Collection $scorecards): Scorecard
    {
        $aggregate = new Scorecard();
        foreach ($scorecards as $scorecard) {
            $aggregate->handshakes += $scorecard->handshakes;
            $aggregate->starBakers += $scorecard->starBakers;
            $aggregate->technicalFirsts += $scorecard->technicalFirsts;
            $aggregate->technicalSeconds += $scorecard->technicalSeconds;
            $aggregate->technicalThirds += $scorecard->technicalThirds;
            $aggregate->technicalLasts += $scorecard->technicalLasts;
            if ($scorecard->raisingAgent) {
                $aggregate->raisingAgent = true;
            }
            if ($scorecard->eliminated) {
                $aggregate->eliminated = true;
            }
            $aggregate->score += $scorecard->score;
        }
        return $aggregate;
    }

    public function calculateScore(): void
    {
        $this->score = ($this->starBakers * 5
                + $this->technicalFirsts * 3
                + $this->technicalSeconds * 2
                + $this->technicalThirds
                + $this->technicalLasts * -2
                + $this->handshakes * 7) * ($this->raisingAgent ? 2 : 1);
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function setScore(int $score): Scorecard
    {
        $this->score = $score;
        return $this;
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
     * @return Scorecard
     */
    public function setHandshakes(int $handshakes): Scorecard
    {
        $this->handshakes = $handshakes;
        return $this;
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
     * @return Scorecard
     */
    public function setStarBakers(int $starBakers): Scorecard
    {
        $this->starBakers = $starBakers;
        return $this;
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
     * @return Scorecard
     */
    public function setTechnicalFirsts(int $technicalFirsts): Scorecard
    {
        $this->technicalFirsts = $technicalFirsts;
        return $this;
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
     * @return Scorecard
     */
    public function setTechnicalSeconds(int $technicalSeconds): Scorecard
    {
        $this->technicalSeconds = $technicalSeconds;
        return $this;
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
    public function setTechnicalThirds(int $technicalThirds): Scorecard
    {
        $this->technicalThirds = $technicalThirds;
        return $this;
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
     * @return Scorecard
     */
    public function setTechnicalLasts(int $technicalLasts): Scorecard
    {
        $this->technicalLasts = $technicalLasts;
        return $this;
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
     * @return Scorecard
     */
    public function setEliminated(bool $eliminated): Scorecard
    {
        $this->eliminated = $eliminated;
        return $this;
    }
}
