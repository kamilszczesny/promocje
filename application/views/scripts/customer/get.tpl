Customer get :)</br>
{*$customers*}</br>
{foreach from=$customers item=item}
	</br>
	</br>
	============================================</br>
	{foreach from=$item item=value key=key}
		{$key}         {$value}</br>
	{/foreach}
	</br>
{/foreach}
{$title}</br>
testowanie