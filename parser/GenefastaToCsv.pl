#!/usr/bin/perl -w

$debut_seq = 0;
$seq = "";
$first = 1;

open(OUT,">genes.csv");
print OUT ("locus;name;length;sequence\n");
while (<>)  	# <> operateur diamant
{		
	if (/^>/) # ^ = debut commence par > = 1 sequence
	{
		if ($first != 1) 
		{
			print($element[0] ."\t" . length($seq) . "\n");
			print OUT ($seq . "\n");
			$seq = "";
		}

		$debut_seq = 1;

		$first = 0;

		@element = (/>(.+)\s\|\sBotrytis\scinerea\s\(B05\.10\)\s(.+)\s\((\d{1,6})\snt\)/g);
		foreach $ele (@element)
		{
			print OUT ($ele . ";");
		}
	}
	else
	{
		chomp $_;
		$seq = $seq . $_;
	}
}
print($element[0] ."\t" . length($seq) . "\n");
print OUT ($seq . "\n");
close(OUT);