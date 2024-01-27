<?php

namespace  Tests;


use Erekle\AlgoTasks\TaskSolver;
use PHPUnit\Framework\TestCase;


class TaskSolverTest extends TestCase
{
    private $solver;

    protected function setUp(): void
    {
        $this->solver = new TaskSolver();
    }

    // Test for Task 1
    public function testFindShortestWordLength()
    {
        $this->assertEquals(3, $this->solver->findShortestWordLength("bitcoin take over the world maybe who knows perhaps"));
        $this->assertEquals(3, $this->solver->findShortestWordLength("turns out random test cases are easier than writing out basic ones"));
    }

    // Test for Task 2
    public function testCountElements()
    {
        $this->assertEquals(3, $this->solver->countElements([1, 2, 3]));
        $this->assertEquals(4, $this->solver->countElements(["x", "y", ["z"]]));
        $this->assertEquals(7, $this->solver->countElements([1, 2, [3, 4, [5]]]));
    }

    // Test for Task 3
    public function testReplaceCharacters()
    {
        $this->assertEquals("(((", $this->solver->replaceCharacters("din"));
        $this->assertEquals("()()()", $this->solver->replaceCharacters("recede"));
        $this->assertEquals(")())())", $this->solver->replaceCharacters("Success"));
        $this->assertEquals("))((", $this->solver->replaceCharacters("(( @"));
    }

    // Test for Task 4
    public function testSolve()
    {
        $this->assertEquals("ababab", $this->solver->solve("3(ab)"));
        $this->assertEquals("abbbabbb", $this->solver->solve("2(a3(b))"));
    }

    // Test for Task 5
    public function testRangeExtraction()
    {
        $this->assertEquals("-6,-3-1,3-5,7-11,14,15,17-20", $this->solver->rangeExtraction([-6,-3,-2,-1,0,1,3,4,5,7,8,9,10,11,14,15,17,18,19,20]));
        $this->assertEquals(
            '-6--2',
            $this->solver->rangeExtraction([-6, -5, -4, -3, -2])
        );
    }

    // Test for Task 6
    public function testSnail()
    {
        $this->assertEquals([1,2,3,6,9,8,7,4,5], $this->solver->snail([[1,2,3],[4,5,6],[7,8,9]]));
        $this->assertEquals([1,2,3,4,5,6,7,8,9], $this->solver->snail([[1,2,3],[8,9,4],[7,6,5]]));
    }
}
