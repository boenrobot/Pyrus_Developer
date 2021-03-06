<?php

/**
 * ~~summary~~
 *
 * ~~description~~
 *
 * PHP version 5.3
 *
 * @category Pyrus
 * @package  Pyrus_Developer
 * @author   Greg Beaver <greg@chiaraquartet.net>
 * @license  http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version  GIT: $Id$
 * @link     https://github.com/pyrus/Pyrus_Developer
 */

namespace Pyrus\Developer\CoverageAnalyzer\Web;

use Pyrus\Developer\CoverageAnalyzer\SourceFile;

class TestSummary extends \ArrayIterator
{
    public $sqlite;
    public function __construct($sqlite)
    {
        $this->sqlite = $sqlite;
        parent::__construct($this->sqlite->retrieveTestPaths());
    }

    public function __call($method, $args)
    {
        return $this->sqlite->$method();
    }

    public function __get($var)
    {
        return $this->sqlite->$var;
    }
}
