<?php

namespace people_functions;

trait test
{
	public function test(...$excess)
	{
		return file_get_contents(str_replace("api","test",IMAGINE_API_URL)."?pre=false");
	}
}
