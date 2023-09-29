import React from 'react';
import Button from '@/Components/Button';
import User from '@/Layouts/User';
import { Head, Link, useForm } from '@inertiajs/inertia-react';

export default function VerifyEmail({ status }) {
    const { post, processing } = useForm();

    const submit = (e) => {
        e.preventDefault();

        post(route('verification.send'));
    };

    return (
        <User>
            <div className="authbg">
                <div className="container auth-container">
                     <div className="row">
                        <div className="col-lg-6 col-md-10 mx-auto shadow authcard">
                            <div className="mb-4 text-sm text-gray-600">
                                Thanks for signing up! Before getting started, could you verify your email address by clicking on the
                                link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                            </div>

                            {status === 'verification-link-sent' && (
                                <div className="mb-4 font-medium text-sm text-green-600">
                                    A new verification link has been sent to the email address you provided during registration.
                                </div>
                            )}

                            <form  onSubmit={submit}>
                                <div className="mt-4 flex text-center">
                                    <Button className='btn btn-primary me-4' processing={processing}>Resend Verification Email</Button>

                                    <Link
                                        href={route('logout')}
                                        method="post"
                                        as="button"
                                        className="btn btn-danger"
                                    >
                                        Log Out
                                    </Link>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </User>
    );
}
