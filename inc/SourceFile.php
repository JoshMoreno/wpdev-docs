<?php
namespace WPDevDocs;

use Symfony\Component\Finder\SplFileInfo;

class SourceFile
{
	public $targetPath;

	/**
	 * @var SplFileInfo
	 */
	protected $file;
	protected $srcDir;
	protected $buildDir;

	public function __construct(SplFileInfo $file, $srcDir, $buildDir)
	{
		$this->file = $file;
		$this->srcDir = $srcDir;
		$this->buildDir = $buildDir;
		$this->targetPath = $this->buildTargetPath();
	}

	/**
	 * The full path to the file
	 * @return string
	 */
	public function fullPath()
	{
		return $this->file->getPathname();
	}

	/**
	 * The full path to the target file
	 * @return mixed
	 */
	public function targetPath()
	{
		return $this->targetPath;
	}

	public function render($data = [])
	{
		if ($this->file->getExtension() === 'md') {
			return file_get_contents($this->fullPath());
		} else {
			ob_start();
			include $this->fullPath();
			return ob_get_clean();
		}

	}

	/*
	|--------------------------------------------------------------------------
	| Protected
	|--------------------------------------------------------------------------
	*/

	/**
	 * Converts the source path into a target path
	 * @return string
	 */
	protected function buildTargetPath()
	{
		$targetDir = str_replace($this->srcDir, $this->buildDir, $this->file->getPath());
		$targetPath = "$targetDir/{$this->file->getFilename()}";
		return str_replace('.php', '.md', $targetPath);
	}
}