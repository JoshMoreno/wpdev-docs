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

	/**
	 * Compares new content to old content
	 * So we can preserve modified times
	 *
	 * @param string $newContent
	 *
	 * @return bool
	 */
	public function hasChanged($newContent)
	{
		if (!file_exists($this->targetPath)) {
			return true;
		}

		$oldContentHash = md5_file($this->targetPath);
		$newContentHash = md5($newContent);

		return $oldContentHash !== $newContentHash;
	}

	/**
	 * Just the inverse of @see hasChanged
	 * @param $newContent
	 *
	 * @return bool
	 */
	public function hasNotChanged($newContent)
	{
		return !$this->hasChanged($newContent);
	}

	public function render($data = [])
	{
		ob_start();
		include $this->fullPath();
		return ob_get_clean();
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