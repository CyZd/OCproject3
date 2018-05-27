<?php
namespace ocproject3;

class Pathfinder
{
    protected $pathArray=[];

    const NO_PATH_FOUND=1;

    public function addPath(Path $path)
    {
        if(!in_array($path, $this->pathArray))
        {
            $this->pathArray[]=$path;
        }
    }

    public function getPath($url)
    {
        foreach ($this->pathArray as $onePath)
        {
            $getVars=$onePath->isMatch($url);
            if (!empty($getVars) || $getVars!= false)
            {
                $variables=$onePath->pathVars();
                $variablesList= [];

                foreach ($getVars as $key => $value)
                {
                    if($key !== 0)
                    {
                        $variablesList[$variables[$key-1]]=$value;
                        
                    }
                }

                $onePath->setPathVarsArray($variablesList);
                return $onePath;
            }
            else
            {
                throw new RunTimeException('No path for this url', self::NO_PATH_FOUND);
            }
            
        }
    }
}
?>