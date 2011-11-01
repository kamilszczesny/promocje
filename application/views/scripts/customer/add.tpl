{if !empty($success)}
	{$success}
{else}
	{$form}
{/if}
<br/>
{if !empty($errorMessage)}{$errorMessage}{/if}
</br>
=============================</br>
{$form2}
{literal}
<script type="text/javascript">AnyTime.picker( "data",{format: "%z-%c-%d %H:%i", firstDOW: 1 } );</script>
{/literal}