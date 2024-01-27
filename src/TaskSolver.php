<?php

namespace Erekle\AlgoTasks;

class TaskSolver
{
    // Task 1: Find the  shortest word length in a sentence
    /**
     * Finds the length of the shortest word in a given sentence.
     *
     * @param string $sentence The sentence to analyze.
     * @return int The length of the shortest word in the sentence.
     */

    public function findShortestWordLength(string $sentence): int
    {
        $words = explode(' ', $sentence);
        $lengths = array_map('strlen', $words);
        return min($lengths);
    }

    // Task 2: Count elements in an array including subarrays

    /**
     * Counts the total number of elements in an array, including nested arrays.
     *
     * @param array $array The array to count elements in.
     * @return int The total number of elements, including those in subarrays.
     */
    public function countElements(array $array): int
    {
        $count = 0;
        foreach ($array as $element) {
            $count++; // Count the element itself
            if (is_array($element)) {
                $count += $this->countElements($element); // Recursively count elements in subarrays
            }
        }
        return $count;
    }

    // Task 3: Replace characters based on frequency
    /**
     * Replaces characters in a string based on their frequency.
     * Unique characters are replaced with '(', while repeated characters are replaced with ')'.
     *
     * @param string $str The string to process.
     * @return string The processed string with characters replaced.
     */

    public function replaceCharacters(string $str): string
    {
        $frequency = array_count_values(str_split(strtolower($str)));
        return str_replace(array_keys($frequency), array_map(fn($f) => $f === 1 ? '(' : ')', $frequency), strtolower($str));
    }

    // Task 4: Solve string pattern
    /**
     * Solves a string pattern by expanding numbers followed by parentheses.
     * E.g., "2(a3(b))" becomes "abbbabbb".
     *
     * @param string $str The string pattern to solve.
     * @return string The solved string.
     */
    public function solve(string $str): string
    {
        while (preg_match('/(\d+)\(([^()]*)\)/', $str, $match)) {
            $str = str_replace($match[0], str_repeat($match[2], $match[1]), $str);
        }
        return $str;
    }

    // Task 5: Range extraction
    /**
     * Extracts ranges from an array of numbers. Consecutive numbers are summarized in a range.
     * Individual numbers or short sequences are listed separately.
     *
     * @param array $array The array of numbers to process.
     * @return string A string representing the number ranges.
     */
    public function rangeExtraction(array $array): string
    {
        sort($array);
        $result = [];
        $rangeStart = null;
        $previous = null;

        foreach ($array as $number) {
            if ($rangeStart === null) {
                $rangeStart = $number;
            } elseif ($previous !== null && $number != $previous + 1) {
                if ($previous - $rangeStart >= 2) {
                    $result[] = "$rangeStart-$previous";
                } else {
                    if ($previous - $rangeStart == 1) {
                        $result[] = $rangeStart;
                    }
                    $result[] = $previous;
                }
                $rangeStart = $number;
            }
            $previous = $number;
        }

        if ($previous - $rangeStart >= 2) {
            $result[] = "$rangeStart-$previous";
        } else {
            if ($previous - $rangeStart == 1) {
                $result[] = $rangeStart;
            }
            $result[] = $previous;
        }

        return implode(',', $result);
    }


    // Task 6: Snail function

    /**
     * Performs the 'snail' operation on a square matrix.
     * Extracts elements from a matrix in a clockwise spiral pattern, starting from the top-left corner.
     *
     * @param array $array The matrix to process.
     * @return array An array of elements extracted in a snail pattern.
     */
    public function snail(array $array): array
    {
        $result = [];
        while (count($array)) {
            $result = array_merge($result, array_shift($array));
            foreach ($array as &$row) {
                $result[] = array_pop($row);
            }
            $array = array_reverse($array);
            foreach ($array as &$row) {
                $row = array_reverse($row);
            }
        }
        return $result;
    }
}
