<h1>An error occurred</h1>
<h2>{$message}</h2>
 
<h3>Exception information:</h3>
<p>
    <b>Message:</b> {$exception->getMessage()}
</p>
 
<h3>Stack trace:</h3>
<pre>{$exception->getTraceAsString()}
</pre>
 
<h3>Request Parameters:</h3>
<pre>{var_export($_view->request->getParams(), true)}
</pre>
