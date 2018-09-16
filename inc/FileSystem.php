<?php

namespace WPDevDocs;

use Symfony\Component\Finder\Finder;

class FileSystem
{
	protected $rootDir;
	protected $srcDir;
	protected $buildDir;

	public $finder;
	public $system;

	public function __construct()
	{
		$this->rootDir = dirname(__DIR__);
		$this->srcDir   = $this->rootDir.'/src';
		$this->buildDir = $this->rootDir.'/build';

		$adapter      = new \League\Flysystem\Adapter\Local($this->rootDir);
		$this->system = new \League\Flysystem\Filesystem($adapter);

		$this->finder = new Finder();
	}

	/**
	 * @return SourceFile[]
	 */
	public function getAllSourceFiles()
	{
		$files = $this->finder
			->files()
			->in($this->srcDir)
			->name('*.md')
			->name('*.php');

		$files = iterator_to_array($files);

		return array_map(function($file) {
			return new SourceFile($file, $this->srcDir, $this->buildDir);
		}, $files);
	}

	/**
	 * @param $path
	 * @param $contents
	 *
	 * @return bool
	 * @throws \League\Flysystem\FileExistsException
	 */
	public function write($path, $contents)
	{
		$path = $this->removeRootPath($path);

		return $this->system->put($path, $contents);
	}

	public function removeRootPath($path)
	{
		return str_replace($this->rootDir, '', $path);
	}
}