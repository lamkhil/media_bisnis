import React from 'react';
import Button from '@/Components/Button';
import User from '@/Layouts/User';
import Input from '@/Components/Input';
import ValidationErrors from '@/Components/ValidationErrors';
import { Head, useForm } from '@inertiajs/inertia-react';

export default function ForgotPassword({ status }) {
    const { data, setData, post, processing, errors } = useForm({
        email: '',
    });

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.value);
    };

    const submit = (e) => {
        e.preventDefault();

        post(route('password.email'));
    };

    return (
        <User>
            <div className="authbg">
                <div className="container auth-container">
                    <div className="col-lg-6 col-md-10 mx-auto shadow authcard">
                        <div className="login-box">
                            <div className="logo-cover d-flex align-items-center">
                                <div className="mb-4 text-sm text-gray-500 leading-normal">
                                    Forgot your password? No problem. Just let us know your email address and we will email you a password
                                    reset link that will allow you to choose a new one.
                                </div>
                            </div>
                            <div className="row">
                                {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}
                                <ValidationErrors errors={errors} />
                                <form onSubmit={submit}>
                                    <Input
                                        type="text"
                                        name="email"
                                        value={data.email}
                                        className="mt-1 block w-full"
                                        placeholder="Enter Email Address"
                                        isFocused={true}
                                        handleChange={onHandleChange}
                                    />

                                    <div className="flex items-center justify-end mt-4">
                                        <Button className="btn-primary w-100" processing={processing}>
                                            Email Password Reset Link
                                        </Button>
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </User>
    );
}
