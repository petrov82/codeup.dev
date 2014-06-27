public function rollDice($guess = null)
	{
		$roll = mt_rand(1, SIDES_OF_DICE);

		$didroll = "Have";

		$result = "";

		if (is_null($guess) || (!is_numeric($guess)))
		{
			$didroll = "Have Not";
			$result = "You must guess a number, or be cast into the gorge of eternal peril! You could have guessed $roll!";
		}
		elseif ($guess == $roll) 
		{
			$result = "You have guessed correctly, padawan! $guess is the correct number!";
		}
		else
		{
			$result = "You have chosen $guess unwisely. The correct answer is $roll.";
		}

		$data = array(
			'guess' => $guess,
			'result' => $result,
			'roll' => $roll,
			'didroll' => $didroll
		);

		return View::make('rolldice')->with($data);
	}
