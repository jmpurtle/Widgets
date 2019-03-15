<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$packageRoot = dirname(__DIR__);
require_once $packageRoot . '/autoload.php';

// Test Helpers
function printEval($condition) {
	// Just throw your conditional statement in there and it'll auto-var_export, just to make it look nicer
	return var_export($condition, true);
}
?>
Feature: Magnus Tags
		 As a developer
		 I want to write DSL
		 So I can avoid writing lots of HTML and logic markup

Scenario: Creating a Fragment

	Given an initialized Fragment with no arguments:
	<?php $fragment = new Magnus\Tags\Fragment(); ?>

	The initialization should succeed, providing a blank Fragment:
	<?=  printEval(($fragment->name == null) &&($fragment->data == array()) && ($fragment->kwargs == array())); ?>

Scenario: Creating a Fragment with data

	Given an initialized Fragment with arguments:
	<?php $fragment = new Magnus\Tags\Fragment('thud', array('foo' => 'bar'), array('baz' => 'qux')); ?>

	The initialization should succeed, providing a Fragment with a set data property:
	<?= printEval($fragment->data == array('foo' => 'bar')) ?>

	And a set kwargs property:
	<?= printEval($fragment->kwargs == array('baz' => 'qux')) ?>

	And a name of thud:
	<?= printEval($fragment->name == 'thud') ?>

Scenario: Printing out a Fragment with data

	Given an initialized Fragment with arguments:
	<?php $fragment = new Magnus\Tags\Fragment('thud', array('foo' => 'bar'), array('baz' => 'qux')); ?>

	The initialization should succeed and printing out the Fragment should give a starting tag:
	<?php
	echo printEval((string) $fragment == '<thud baz="qux">');
	?>

<?= "\n\n" ?>